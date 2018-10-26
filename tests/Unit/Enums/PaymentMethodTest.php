<?php

namespace Wearesho\Pvbki\Tests\Unit\Enums;

use PHPUnit\Framework\TestCase;
use Wearesho\Pvbki\Enums\PaymentMethod;

/**
 * Class PaymentMethodTest
 * @package Wearesho\Pvbki\Tests\Unit\Enums
 * @coversDefaultClass PaymentMethod
 * @internal
 */
class PaymentMethodTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(
            PaymentMethod::AUTHORIZATION_TO_DIRECT_CURRENT_ACCOUNT_DEBIT(),
            new PaymentMethod(PaymentMethod::AUTHORIZATION_TO_DIRECT_CURRENT_ACCOUNT_DEBIT)
        );
        $this->assertEquals(PaymentMethod::BANKING_RECEIPT(), new PaymentMethod(PaymentMethod::BANKING_RECEIPT));
        $this->assertEquals(
            PaymentMethod::CURRENT_ACCOUNT_DEBIT(),
            new PaymentMethod(PaymentMethod::CURRENT_ACCOUNT_DEBIT)
        );
        $this->assertEquals(PaymentMethod::DIRECT_REMITTANCE(), new PaymentMethod(PaymentMethod::DIRECT_REMITTANCE));
        $this->assertEquals(PaymentMethod::EXCHANGE_BILL(), new PaymentMethod(PaymentMethod::EXCHANGE_BILL));
        $this->assertEquals(
            PaymentMethod::METHOD_OF_OVERDUE_CALCULATION_FIFO(),
            new PaymentMethod(PaymentMethod::METHOD_OF_OVERDUE_CALCULATION_FIFO)
        );
        $this->assertEquals(
            PaymentMethod::METHOD_OF_OVERDUE_CALCULATION_LIFO(),
            new PaymentMethod(PaymentMethod::METHOD_OF_OVERDUE_CALCULATION_LIFO)
        );
        $this->assertEquals(PaymentMethod::UNDETERMINED(), new PaymentMethod(PaymentMethod::UNDETERMINED));

        $this->assertNull((new PaymentMethod(null))->jsonSerialize());
        $this->assertNull(PaymentMethod::UNDEFINED()->getValue());
    }
}
