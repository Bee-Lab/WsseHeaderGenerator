<?php

namespace BeelabWsseHeaderGenerator;

/**
 * Class WsseHeaderGenerator.
 */
class WsseHeaderGenerator
{
    /**
     * @var NoncerInterface
     */
    protected $noncer;

    /**
     * @var DaterInterface
     */
    protected $dater;

    /**
     * @var DigesterInterface
     */
    protected $digester;

    /**
     * WsseHeaderGenerator constructor.
     *
     * @param NoncerInterface   $noncer
     * @param DaterInterface    $dater
     * @param DigesterInterface $digester
     */
    public function __construct(
        NoncerInterface $noncer,
        DaterInterface $dater,
        DigesterInterface $digester

    ) {
        $this->noncer = $noncer;
        $this->dater = $dater;
        $this->digester = $digester;
    }

    /**
     * @param $username
     * @param $password
     *
     * @return string
     */
    public function generate($username, $password, $createTime = 'now')
    {
        $nonce = base64_encode($this->noncer->generate());
        $created = $this->dater->generate($createTime);
        $digest = $this->digester->generate($nonce, $created, $password);

        return sprintf(
            'X-WSSE: UsernameToken Username="%s", PasswordDigest="%s", Nonce="%s", Created="%s"',
            $username,
            base64_encode($digest),
            base64_encode($nonce),
            $created
        );
    }

    /**
     * I parametri usati come default fanno riferimento allo User inserito tramita la Fixture
     * src/AppBundle/DataFixtures/ORM/UserData.php.
     *
     * @param string $username
     * @param string $password
     * @param string $salt
     * @param string $createTime
     *
     * @return mixed
     */
    public function generateForTest(
        $username = 'admin1@example.org',
        $password = 'password',
        $createTime = 'now'
    ) {
        $header = $this->generate($username, $password, $createTime);

        return str_replace('X-WSSE: ', '', $header);
    }
}
