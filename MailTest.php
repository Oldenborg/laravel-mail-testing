<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MailTest extends TestCase
{
    use MailTracking;

    /** @test */
    public function we_do_no_just_randomly_send_out_emails ()
    {
        $this->seeEmailWasNotSent();
    }
        
    /** @test */
    public function our_mail_tracking_trait_works_as_expected ()
    {

        // Send 2 identical emails
        for($i = 0; $i < 2; $i++)
        {
            mail::raw('Hello World', function ($message) {
                $message->to('foo@bar.com');
                $message->from('bar@foo.com');
                $message->subject('Hello from the other side');
            });
        }

        $this->seeEmailWasSent()
             ->seeEmailsSent(2)
             ->seeEmailEquals('Hello World')
             ->seeEmailContains('World')
             ->seeEmailSubjectEquals('Hello from the other side')
             ->seeEmailSubjectContains('other')
             ->seeEmailTo('foo@bar.com')
             ->seeEmailFrom('bar@foo.com');
    }
}
