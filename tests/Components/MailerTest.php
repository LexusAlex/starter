<?php

declare(strict_types=1);

namespace Test\Components;

use PHPUnit\Framework\TestCase;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\Mailer\EventListener\EnvelopeListener;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport\Smtp\EsmtpTransport;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;

/**
 * @internal
 */
final class MailerTest extends TestCase
{
    public function testSendMail(): void
    {
        $dispatcher = new EventDispatcher();
        $dispatcher->addSubscriber(new EnvelopeListener(new Address(getenv('MAILER_FROM_EMAIL'), getenv('MAILER_FROM_NAME'))));

        $transport = (new EsmtpTransport(
            getenv('MAILER_HOST'),
            (int)getenv('MAILER_PORT'),
            getenv('MAILER_ENCRYPTION') === 'tls',
            $dispatcher,
        ))
            ->setUsername(getenv('MAILER_USERNAME'))
            ->setPassword(getenv('MAILER_PASSWORD'));

        $mailer = new Mailer($transport);
        $message = (new Email())
            ->subject('Join Confirmation')
            ->to('test@email.ru')
            ->text('Во-первых, если рассматривать сохранение такого объекта, то нам не очень подойдут готовые ORM. Выбранную или свою ORM нужно научить тому, что поле  не надо сохранять в БД, так как там находится не простое значение, а сервис. И что потом при восстановлении объекта после доставания из БД нужно достать из контейнера и поместить обратно в это поле сервис хэшера.');

        $mailer->send($message);
        self::assertTrue(true);
    }
}
