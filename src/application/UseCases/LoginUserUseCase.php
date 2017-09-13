<?php

namespace embryon\application\UseCases;

use embryon\application\dtos\LoginUserRequest;
use embryon\application\transformers\LoginUserTransformerInterface;
use embryon\domain\infrastructure\UserRepositoryInterface;
use yii\db\Exception;

/**
 * Class LoginUserUseCase
 * @package embryon\application\UseCases
 */
class LoginUserUseCase extends UseCase
{
    /** @var LoginUserTransformerInterface  */
    private $transformer;
    /** @var UserRepositoryInterface  */
    private $repository;

    public function __construct(LoginUserTransformerInterface $transformer, UserRepositoryInterface $repository)
    {
        $this->transformer = $transformer;
        $this->repository = $repository;
    }


    public function execute(LoginUserRequest $request)
    {
        $this->transformer->fromRequestToDomain($request);
        $__userIdentity = $this->repository->ofIdOrFail($request->getUserId());

        if(!$__userIdentity->login()) {
            throw new Exception($__userIdentity->getErrorMessage());
        };


        /**
         * Tenemos que montar un response con el token que podemos recoger del __UserIdentity
         * Login debería haber generado el token y poblado el objeto
         */

    }

}