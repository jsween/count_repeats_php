<?php
    class CountRepeats
    {
        function count($input_phrase, $input_word)
        {
            $count = 0;
            $words = explode(' ', $input_phrase);
            $search_word = strtolower($input_word);
            foreach ($words as $i => $word) {
                $word = strtolower($word);
                if($search_word == $word) {
                    $count++;
                }
            }
            return $count;
        }
    }

 ?>
