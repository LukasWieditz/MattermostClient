<?php

namespace Pnz\MattermostClient\Tests\Model\User;

use PHPUnit\Framework\TestCase;
use Pnz\MattermostClient\Exception\InvalidArgumentException;
use Pnz\MattermostClient\Model\ModelBuilder;
use Pnz\MattermostClient\Model\User\UserBuilder;

/**
 * @coversDefaultClass \Pnz\MattermostClient\Model\User\UserBuilder
 */
class UserBuilderTest extends TestCase
{
    /**
     * @var UserBuilder
     */
    private $builder;

    public function setUp()
    {
        $this->builder = new UserBuilder();
    }

    public function provideBuildTypesForFailure()
    {
        return [
            'create' => [UserBuilder::BUILD_FOR_CREATE, 'Required parameters missing: username, email, password'],
            'update' => [UserBuilder::BUILD_FOR_UPDATE, 'Required parameters missing: id'],
        ];
    }

    /**
     * @dataProvider provideBuildTypesForFailure
     *
     * @param string $buildType
     * @param string $expectedFailureMessage
     */
    public function testUserBuilderNoParams($buildType, $expectedFailureMessage)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage($expectedFailureMessage);
        $this->builder->build($buildType);
    }

    public function testUserBuilderMinimal()
    {
        $this->builder->setUsername('username');
        $this->builder->setPassword('password');
        $this->builder->setEmail('email');

        $expected = [
            'username' => 'username',
            'password' => 'password',
            'email' => 'email',
        ];

        $this->assertSame($expected, $this->builder->build());
    }

    public function testUserBuilderFull()
    {
        $this->builder->setUsername('username');
        $this->builder->setPassword('password');
        $this->builder->setEmail('email');
        $this->builder->setLastName('last-name');
        $this->builder->setFirstName('first-name');
        $this->builder->setNickname('nickname');

        $expected = [
            'username' => 'username',
            'password' => 'password',
            'email' => 'email',
            'last_name' => 'last-name',
            'first_name' => 'first-name',
            'nickname' => 'nickname',
        ];

        $this->assertSame($expected, $this->builder->build());
    }

    public function testChannelBuilderPatch()
    {
        $expected = [];
        $this->assertSame($expected, $this->builder->build(ModelBuilder::BUILD_FOR_PATCH));
    }
}
