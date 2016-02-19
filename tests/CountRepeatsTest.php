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
        function test_one_match()
        {
            //Arrange
            $test_Count_Repeat = new CountRepeats;
            $phrase = "The cat in the hat";
            $search_word = "cat";

            //Act
            $result = $test_Count_Repeat->count($phrase, $search_word);

            //Assert
            $this->assertEquals(1, $result);
        }
        function test_two_matches()
        {
            //Arrange
            $test_Count_Repeat = new CountRepeats;
            $phrase = "The cat in the hat saw a cat";
            $search_word = "cat";

            //Act
            $result = $test_Count_Repeat->count($phrase, $search_word);

            //Assert
            $this->assertEquals(2, $result);
        }
        function test_substring_no_match()
        {
            //Arrange
            $test_Count_Repeat = new CountRepeats;
            $phrase = "The catcher saw a dog";
            $search_word = "cat";

            //Act
            $result = $test_Count_Repeat->count($phrase, $search_word);

            //Assert
            $this->assertEquals(0, $result);
        }
        function test_substring_one_match()
        {
            //Arrange
            $test_Count_Repeat = new CountRepeats;
            $phrase = "The catcher saw a cat";
            $search_word = "cat";

            //Act
            $result = $test_Count_Repeat->count($phrase, $search_word);

            //Assert
            $this->assertEquals(1, $result);
        }
        function test_substring_capitalization_word()
        {
            //Arrange
            $test_Count_Repeat = new CountRepeats;
            $phrase = "The catcher saw a cat";
            $search_word = "CaT";

            //Act
            $result = $test_Count_Repeat->count($phrase, $search_word);

            //Assert
            $this->assertEquals(1, $result);
        }
        function test_substring_capitalization_phrase()
        {
            //Arrange
            $test_Count_Repeat = new CountRepeats;
            $phrase = "The CAT in the hat saw a CaT riding another cAt";
            $search_word = "cat";

            //Act
            $result = $test_Count_Repeat->count($phrase, $search_word);

            //Assert
            $this->assertEquals(3, $result);
        }
        function test_substring_capitalization_both()
        {
            //Arrange
            $test_Count_Repeat = new CountRepeats;
            $phrase = "The CAT in the hat saw a CaT riding another cAt";
            $search_word = "cAt";

            //Act
            $result = $test_Count_Repeat->count($phrase, $search_word);

            //Assert
            $this->assertEquals(3, $result);
        }
    }

 ?>
