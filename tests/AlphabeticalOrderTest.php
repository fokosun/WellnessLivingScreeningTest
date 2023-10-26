<?php

namespace tests;

use App\AlphabeticalOrder;
use PHPUnit\Framework\TestCase;

class AlphabeticalOrderTest extends TestCase
{
    /**
     * @dataProvider TestDataProvider
     */
    public function test_find(array $data, string $expected)
    {
        $alphabeticalOrder = new AlphabeticalOrder($data);
        $this->assertSame($alphabeticalOrder->findFirst(), $expected);
    }

    public static function TestDataProvider(): array
    {
        return [
            'all lower cases' => [
                'data' => ['my','name','is','john','doe'],
                'expected' => 'doe'
            ],
            'all upper cases' => [
                'data' => ['JOHN','NAME','DOE','MY','IS'],
                'expected' => 'DOE'
            ],
            'starts with uppercase' => [
                'data' => ['My','Name','Is','John','Doe'],
                'expected' => 'Doe'
            ],
            'ends with uppercase' => [
                'data' => ['mY','namE','iS','johN','doE'],
                'expected' => 'doE'
            ],
            'shuffled all lowercase' => [
                'data' => ['john','doe', 'is', 'my', 'name'],
                'expected' => 'doe'
            ],
            'duplicates with upper and lowercase and space' => [
                'data' => ['my','name','My name', 'My name is john doe', 'am I john doe', 'is','john','doe', 'DOE', 'JOHN', 'random'],
                'expected' => 'DOE'
            ],
            'extra' => [
                'data' => ['i','am','john','doe'],
                'expected' => 'am'
            ],
            'simple-1' => [
                'data' => ['D', 'd'],
                'expected' => 'D'
            ],
            'simple-2' => [
                'data' => ['jOHN', 'JOHN'],
                'expected' => 'JOHN'
            ]
        ];
    }
}
