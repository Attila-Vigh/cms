<?php

    // validate presence of data and trims it
    function is_blank($value) {
        return !isset($value) || trim($value) === '';
    }

    // reverse of is_blank()
    function has_presence($value) {
        return !is_blank($value);
    }

    
    // validate string length - e.g. has_length_greater_than('abcd', 3)
    function has_length_greater_than($value, $min) {
        $length = strlen($value);
        return $length > $min;
    }

    function has_length_less_than($value, $max) {
        $length = strlen($value);
        return $length < $max;
    }

    function has_length_exactly($value, $exact) {
        $length = strlen($value);
        return $length == $exact;
    }

    // combines functions has_length_greater_than, has_length_less_than, has_length_exactly
    // e.g. has_length('abcd', ['min' => 3, 'max' => 5])
    function has_length($value, $options) {
        if(isset($options['min']) && !has_length_greater_than($value, $options['min'] - 1)) {
            return false;
        } elseif(isset($options['max']) && !has_length_less_than($value, $options['max'] + 1)) {
            return false;
        } elseif(isset($options['exact']) && !has_length_exactly($value, $options['exact'])) {
            return false;
        } else {
            return true;
        }
    }

    // e.g. has_inclusion_of( 5, [1,3,5,7,9] )
    function has_inclusion_of($value, $array) {
        return in_array($value, $array);
    }

    // e.g. has_exclusion_of( 5, [1,3,5,7,9] )
    function has_exclusion_of($value, $array) {
        return !in_array($value, $array);
    }

    // e.g. has_string('somebody@there.com', '.com')
    // strpos returns string start position or false
    // strpos is faster than preg_match()
    function has_string($string, $required_string) {
        return strpos($string, $required_string) !== false;
    }

    // e.g. has_valid_email_format('somebody@there.com')
    // validate correct format for email addresses
    //    returns 1 for a match, 0 for no match
    function has_valid_email_format($value) {
        $email_regex = '/\A[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\Z/i';
        return preg_match($email_regex, $value) === 1;
    }

    // e.g. has_unique_username('blackjack')
    // Validates uniqueness of admins.username
    // For new records, provide only the username.
    // For existing records, provide current ID as second argument
    //   has_unique_username('blackjack', 4)
    function has_unique_username($username, $current_id="0") {
        $admin = Admin::find_by_username($username);
        if($admin === false || $admin->id == $current_id) {
            // is unique
            return true;
        } else {
            // not unique
            return false;
        }
    }

?>
