<?php
session_start();
function print_table($timetable, $dayoff)
{
    // start, end, hour, minute
    if ($dayoff)
    {
        // 08:30~11:30
        // 12:30~15:00
        // 15:00~17:30
        // 18:30~21:00
        $rtimes = array(
            [
                'sh' => '08',
                'sm' => '30',
                'eh' => '11',
                'em' => '30'
            ],
            [
                'sh' => '12',
                'sm' => '30',
                'eh' => '15',
                'em' => '00'
            ],
            [
                'sh' => '15',
                'sm' => '00',
                'eh' => '17',
                'em' => '30'
            ],
            [
                'sh' => '18',
                'sm' => '30',
                'eh' => '21',
                'em' => '00'
            ]
        );
    }
    else
    {
        //18:00~19:30
        //19:30~21:00
        $rtimes = array(
            [
                'sh' => '18',
                'sm' => '00',
                'eh' => '19',
                'em' => '30'
            ],
            [
                'sh' => '19',
                'sm' => '30',
                'eh' => '21',
                'em' => '00'
            ]
        );
    }
    $pc_num = 8;

    $nh = intval(date('H'));
    $nm = intval(date('i')) + 10;

    //$nh = 23; // 여기 삭제해야됨..
    //$nm = 50; // 여기 삭제해야됨..

    if ($nm >= 60)
    {
        $nh += 1;
        $nm -= 60;
    }

    for($i = 1; $i <= count($rtimes); $i++)
    {
        for($j = 1; $j <= $pc_num; $j++)
        {
            $sh = $rtimes[$i-1]['sh'];
            $sm = $rtimes[$i-1]['sm'];
            $eh = $rtimes[$i-1]['eh'];
            $em = $rtimes[$i-1]['em'];

            echo '<tr>';
            if ($j == 1)
            {
                $_ = $sh.":".$sm."~".$eh.":".$em;
                echo '<td rowspan="'.$pc_num.'">'.$_.'</td>';
            }
            echo '<td>PC'.$j.'</td>';

            if (empty($timetable[$i][$j]))
            {
                if ($nh < $sh || ($nh == $sh && $nm < $sm))
                    echo '<td class="disable">준비중...</td>';
                else{
                    $_ = "'reserve.php?rtime=".$i."&rpc=".$j."'";
                    echo '<td class="enable">';
                    if(isset($_SESSION['idx']) && isset($_SESSION['id']) && isset($_SESSION['name']))
                        echo '<div onclick="location.replace('.$_.')";>';
                    echo '사용 가능';
                    if(isset($_SESSION['idx']) && isset($_SESSION['id']) && isset($_SESSION['name']))
                        echo '</div>';
                    echo '</td>';
                }
            }
            else{
                echo '<td>'.$timetable[$i][$j][1].'</td>';
            }
            echo '</tr>';
        }
    }
}
?>