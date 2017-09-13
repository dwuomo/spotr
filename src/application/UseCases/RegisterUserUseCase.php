<?php

namespace embryon\application\UseCases;


use embryon\application\dtos\RegisterUser\RegisterUserResponse;
use embryon\application\dtos\RegisterUserRequest;
use embryon\application\Exceptions\BadRequestException;
use embryon\application\transformers\RegisterUserTransformerInterface;
use embryon\domain\Exceptions\ImposibleStoreDataException;
use embryon\domain\model\User;

/**
 * Class RegisterUserUseCase
 * @package embryon\application\UseCases
 */
class RegisterUserUseCase extends UseCase
{

    /** @var RegisterUserTransformerInterface */
    private $transformer;

    /**
     * RegisterUserUseCase constructor.
     * @param RegisterUserTransformerInterface $registerUserTransformer
     */
    public function __construct(
        RegisterUserTransformerInterface $registerUserTransformer
    ) {
        $this->transformer = $registerUserTransformer;
    }

    /**
     * @param RegisterUserRequest $registerUserRequest
     * @return RegisterUserResponse
     * @throws BadRequestException
     * @throws ImposibleStoreDataException
     */
    public function execute(RegisterUserRequest $registerUserRequest)
    {
        /** @var User $user */
        $user = $this->transformer->fromRequestToDomain($registerUserRequest);

        if (!$user->validate()) {
            throw new BadRequestException("Bad Request exception");
        }

        if (!$user->save()) {
            throw new ImposibleStoreDataException();
        };

        return $this->transformer->fromDomainToResponse($user);
    }

}