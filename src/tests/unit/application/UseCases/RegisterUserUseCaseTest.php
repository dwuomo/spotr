<?php

namespace embryon\tests\application\UseCases;


use embryon\application\dtos\RegisterUser\RegisterUserResponse;
use embryon\application\dtos\RegisterUserRequest;
use embryon\application\Exceptions\BadRequestException;
use embryon\application\UseCases\RegisterUserUseCase;
use embryon\domain\Exceptions\ImposibleStoreDataException;
use embryon\tests\fakes\RegisterUser\RegisterUserTransformerFake;
use embryon\tests\fakes\RegisterUser\RegisterUserValidatorFake;
use embryon\tests\fakes\RegisterUser\UserModelFake;
use PHPUnit\Framework\TestCase;

class RegisterUserUseCaseTest extends TestCase
{

    /** @var  RegisterUserTransformerFake */
    private $registerUserTransformer;
    /** @var  RegisterUserRequest */
    private $request;
    /** @var  RegisterUserUseCase */
    private $useCase;
    /** @var  RegisterUserValidatorFake */
    private $registerUserValidator;

    public function setUp()
    {
        parent::setUp();

        $this->registerUserTransformer = new RegisterUserTransformerFake();

        $this->useCase = new RegisterUserUseCase($this->registerUserTransformer);
    }

    /** @test */
    public function executeShouldTransformIntoDomainObject()
    {
        $registerUserTransformer = new RegisterUserTransformerFake();
        $useCase = new RegisterUserUseCase($registerUserTransformer);

        $request = new RegisterUserRequest();

        $useCase->execute($request);

        $this->assertTrue($registerUserTransformer->getTimesCalled() == 1);

        $this->assertFalse($registerUserTransformer->getTimesCalled() == 2);
    }

    /** @test */
    public function executeShouldCallRegisterValidator()
    {

        $registerUserTransformer = new RegisterUserTransformerFake();
        $userModel = new UserModelFake();

        $registerUserTransformer->fromRequestToDomainShoulReturn($userModel);

        $useCase = new RegisterUserUseCase($registerUserTransformer);
        $request = new RegisterUserRequest();

        $useCase->execute($request);

        $this->assertTrue($userModel->getValidateTimesCalled() == 1);
    }


    /** @test */
    public function ifNotValidShoulRaiseException()
    {
        $registerUserTransformer = new RegisterUserTransformerFake();
        $userModel = new UserModelFake();
        $userModel->validateShouldReturn(false);

        $registerUserTransformer->fromRequestToDomainShoulReturn($userModel);

        $useCase = new RegisterUserUseCase($registerUserTransformer);
        $request = new RegisterUserRequest();


        try {
            $useCase->execute($request);

            $this->fail("Exception not raised");
        } catch (BadRequestException $e) {
            $this->assertTrue(true);
        }
    }

    /** @test */
    public function executeShoulGetErrorMessageFromValidator()
    {

        $registerUserTransformer = new RegisterUserTransformerFake();
        $userModel = new UserModelFake();
        $request = new RegisterUserRequest();

        $errorMessage = "Bad Request exception";

        $userModel->validateShouldReturn(false);
        $userModel->errorMessageShouldReturn($errorMessage);

        $registerUserTransformer->fromRequestToDomainShoulReturn($userModel);

        $useCase = new RegisterUserUseCase($registerUserTransformer);

        try {
            $useCase->execute($request);

            $this->fail("Exception not raised");
        } catch (BadRequestException $e) {
//            $this->assertTrue($userModel->getErrorMessageTimesCalled() == 1);
            $this->assertEquals($e->getMessage(), $errorMessage);
        }
    }

    /** @test */
    public function executeShoulSave()
    {
        $registerUserTransformer = new RegisterUserTransformerFake();
        $registerUserValidator = new RegisterUserValidatorFake();
        $useCase = new RegisterUserUseCase($registerUserTransformer, $registerUserValidator);

        $userFake = new UserModelFake();
        $registerUserTransformer->fromRequestToDomainShoulReturn($userFake);

        $request = new RegisterUserRequest();

        $useCase->execute($request);

        $this->assertTrue($userFake->getTimesSaveCalled() == 1);
    }


    /** @test */
    public function ifNotSaveShoulRaiseException()
    {
        $registerUserTransformer = new RegisterUserTransformerFake();
        $registerUserValidator = new RegisterUserValidatorFake();
        $useCase = new RegisterUserUseCase($registerUserTransformer, $registerUserValidator);

        $userFake = new UserModelFake();
        $userFake->saveShouldReturn(false);

        $registerUserTransformer->fromRequestToDomainShoulReturn($userFake);

        $request = new RegisterUserRequest();

        try {
            $useCase->execute($request);
            $this->fail("Exception not raised");
        } catch (ImposibleStoreDataException  $e) {
            $this->assertTrue(true);
        }
    }

    /** @test */
    public function executeShouldReturnResponseObject()
    {
        $registerUserTransformer = new RegisterUserTransformerFake();
        $registerUserValidator = new RegisterUserValidatorFake();
        $useCase = new RegisterUserUseCase($registerUserTransformer);

        $userFake = new UserModelFake();

        $registerUserTransformer->fromRequestToDomainShoulReturn($userFake);

        $request = new RegisterUserRequest();

        $registerUserTransformer->fromDomainToResponseShouldResponse(new RegisterUserResponse());

        $result = $useCase->execute($request);

        $this->assertInstanceOf(RegisterUserResponse::class, $result);
    }


}