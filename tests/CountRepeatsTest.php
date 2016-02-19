<?php
    require_once "src/CountRepeats.php";

    class CountRepeatsTest extends PHPUnit_Framework_TestCase
    {
        function test_no_matches()
        {
            //Arrange
            $test_Count_Repeat = new CountRepeats;
            $phrase = "The cat in the hat";
            $search_word = "dog";

            //Act
            $result = $test_Count_Repeat->count($phrase, $search_word);

            //Assert
            $this->assertEquals(0, $result);
        }
    }

 ?>
