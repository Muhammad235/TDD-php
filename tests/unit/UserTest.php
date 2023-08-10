<?php


use PHPUnit\Framework\TestCase;
use App\Models\User;


class UserTest extends TestCase
{
    protected $user;

    public function setUp() : void{
        $this->user = new User;
    }

    /** @test **/
    public function get_firstName() 
    {

        $this->user->setFirstName('Babie');

        $this->assertEquals($this->user->getFirstName(), 'Babie');
    }

    public function testGetLastName() 
    {
    
        $this->user->setLastName('Collins');

        $this->assertEquals($this->user->getLastName(), 'Collins');
    }

    public function testFullNameIsReturned(){
 
        $this->user->setFirstName('Babie');
        $this->user->setLastName('Collins');

        $this->assertEquals($this->user->getFullName(), 'Babie Collins');
    }

    public function testFirstAndLastNameAreTrimmed(){

        $this->user->setFirstName('   Babie   ');
        $this->user->setLastName('     Collins');

        $this->assertEquals($this->user->getFirstName(), 'Babie');
        $this->assertEquals($this->user->getLastName(), 'Collins');
    }

    public function testEmailAddressCanBeSet(){

        $this->user->email = "babie@gmail.com";

        $this->assertEquals($this->user->email, 'babie@gmail.com');
    }

    public function testEmailVariablesContainCorrectValues(){

        $this->user->first_name ="Babie";
        $this->user->last_name ="Collins";
        $this->user->email ="babie@gmail.com";

        $emailVariables = $this->user->getEmailVariables();

        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);

        $this->assertEquals($emailVariables['full_name'], 'Babie Collins');
        $this->assertEquals($emailVariables['email'], 'babie@gmail.com');

    }


}