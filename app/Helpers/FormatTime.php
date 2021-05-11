<?php

namespace App\Helpers;

class FormatTime
{

    public static function LongTimeFilter($date)
    {
        if ($date == null)
        {
            return "Sin fecha";
        }

        $now_date = new \DateTime();
        $date2 = $now_date->format('Y-m-d H:i:s');

        $datetime1 = new \DateTime($date);
        $datetime2 = new \DateTime($date2);

        $since_start = $datetime1->diff($datetime2);


        if ($since_start->y == 0)
        {
            if ($since_start->m == 0)
            {
                if ($since_start->d == 0)
                {
                    if ($since_start->h == 0)
                    {
                        if ($since_start->i == 0)
                        {
                            if ($since_start->s == 0)
                            {
                                $result = $since_start->s . ' segundos';
                            } else
                            {
                                if ($since_start->s == 1)
                                {
                                    $result = $since_start->s . ' segundo';
                                } else
                                {
                                    $result = $since_start->s . ' segundos';
                                }
                            }
                        } else
                        {
                            if ($since_start->i == 1)
                            {
                                $result = $since_start->i . ' minuto';
                            } else
                            {
                                $result = $since_start->i . ' minutos';
                            }
                        }
                    } else
                    {
                        if ($since_start->h == 1)
                        {
                            $result = $since_start->h . ' hora';
                        } else
                        {
                            $result = $since_start->h . ' horas';
                        }
                    }
                } else
                {
                    if ($since_start->d == 1)
                    {
                        $result = $since_start->d . ' día';
                    } else
                    {
                        $result = $since_start->d . ' días';
                    }
                }
            } else
            {
                if ($since_start->m == 1)
                {
                    $result = $since_start->m . ' mes';
                } else
                {
                    $result = $since_start->m . ' meses';
                }
            }
        } else
        {
            if ($since_start->y == 1)
            {
                $result = $since_start->y . ' año';
            } else
            {
                $result = $since_start->y . ' años';
            }
        }

        return "Hace " . $result;
    }

}
