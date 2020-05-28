<?php

/* getState()
 * Return an array of state options
 * @return array
 */
function getState()
{
    return array('Alabama','Alaska','American Samoa','Arizona','Arkansas','California','Colorado','Connecticut',
        'Delaware','District of Columbia','Federated States of Micronesia','Florida','Georgia','Guam','Hawaii','Idaho',
        'Illinois','Indiana','Iowa','Kansas','Kentucky','Louisiana','Maine','Marshall Islands','Maryland',
        'Massachusetts','Michigan','Minnesota','Mississippi','Missouri','Montana','Nebraska','Nevada','New Hampshire',
        'New Jersey','New Mexico','New York','North Carolina','North Dakota','Northern Mariana Islands','Ohio',
        'Oklahoma','Oregon','Palau','Pennsylvania','Puerto Rico','Rhode Island','South Carolina','South Dakota',
        'Tennessee','Texas','Utah','Vermont','Virgin Island','Virginia','Washington','West Virginia','Wisconsin',
        'Wyoming');
}

/* getIndoor()
 * Return an array of in-door interests options
 * @return array
 */
function getIndoor()
{
    return array("Tv", "Puzzles", "Movies", "Reading", "Cookies", "Playing cards", "Board games", "Video games");
}

/* getOutdoor()
 * Return an array of out-door interests options
 * @return array
 */
function getOutdoor()
{
    return array("hiking", "biking", "swimming", "collecting", "walking", "climbing");
}
