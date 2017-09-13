<?php

namespace embryon\tests\application\UseCases;


use embryon\application\dtos\LoginUserRequest;
use embryon\application\UseCases\LoginUserUseCase;
use embryon\domain\model\__UserIdentity;
use embryon\tests\fakes\LoginUser\LoginUserTransformerFake;
use embryon\tests\fakes\User\__UserIdentityFake;
use embryon\tests\fakes\User\UserRepositoryFake;
use PHPUnit_Framework_TestCase;
use yii\db\Exception;

class LoginUserUserCaseTest extends PHPUnit_Framework_TestCase
{

    /**
     * 1) Poblamos el objeto de dominio con los datos del request
     * 2) Consultamos al storage a ver si el usuario existe
     * 3) y logamos al usuario, levantando la session
     * 4) si no loga devolvemos una exception
     * 4) Si loga generamos el token
     * 5) devolvemos un objeto con el token
     */

    /** @test */
    public function useCaseShouldCallTransformer()
    {
        /** * Given */
        $transformer = new LoginUserTransformerFake();
        $repository = new UserRepositoryFake();
        $useCase = new LoginUserUseCase($transformer, $repository);
        $request = new LoginUserRequest();

        /** * When */
        $useCase->execute($request);

        /** * Then */
        $this->assertTrue($transformer->getFromRequestToDomainTimesCalled() == 1);
    }

    /** @test */
    public function useCaseShouldGetUserFromRepository()
    {
        /** * Given */
        $transformer = new LoginUserTransformerFake();
        $repository = new UserRepositoryFake();
        $useCase = new LoginUserUseCase($transformer, $repository);
        $request = new LoginUserRequest();
        $iterator = 0;

        /** * When */
        $dataProvider = [212, 100, 113, 114];

        foreach ($dataProvider as $expected) {
            $iterator++;
            $request->setUserId($expected);
            $useCase->execute($request);

            /** * Then */
            $this->assertTrue($repository->getofIdOrFailTimesCalled() == $iterator);
            $this->assertEquals($expected,  $repository->getOfIdOrFailHasReceived());
        }
    }

    /** @test */
    public function shouldLoginUser()
    {
        /** * Given */
        $transformer = new LoginUserTransformerFake();
        $repository = new UserRepositoryFake();
        $userIdentity = new __UserIdentityFake();
        $repository->ofIdOrFailShouldResponse($userIdentity);
        $useCase = new LoginUserUseCase($transformer, $repository);
        $request = new LoginUserRequest();

        /** * When */
        $useCase->execute($request);

        /** * then */
        $this->assertTrue($userIdentity->loginTimesCalled() == 1);
    }

    /** @test */
    public function ifnotLoginShoulRaisedException()
    {
        $transformer = new LoginUserTransformerFake();
        $repository = new UserRepositoryFake();
        $userIdentity = new __UserIdentityFake();
        $userIdentity->loginShouldResponse(false);
        $repository->ofIdOrFailShouldResponse($userIdentity);
        $useCase = new LoginUserUseCase($transformer, $repository);
        $request = new LoginUserRequest();

        try {
            $useCase->execute($request);

            $this->fail("Exception not raised");
        } catch (Exception $e) {
            $this->assertTrue(true);
        }

    }


}