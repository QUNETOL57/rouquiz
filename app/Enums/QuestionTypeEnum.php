<?php

namespace App\Enums;

enum QuestionTypeEnum: int
{
    case ONE_ANSWER = 1;
    case MANY_ANSWERS = 2;
    case INPUT_ANSWER = 3;
    case SEQUENCE_ANSWERS = 4;
    case DRAG_AND_DROP_ANSWERS = 5;
}
