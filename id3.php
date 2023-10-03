<?php

function predictMushroom($color, $size, $points) 
{
    if ($points === 'Yes') 
	{
        if ($color === 'Red') 
	{
            return 'Toxic';
        } elseif ($color === 'Brown' || $color === 'Green') {
            return 'Edible';
        }
    } elseif ($points === 'No') {
        return 'Edible';
    }
    return 'Unknown';
}

// Contoh penggunaan
$color = 'Green';
$size = 'Large';
$points = 'No';

$classification = predictMushroom($color, $size, $points);
echo "Color: $color <br> Size: $size <br> Points: $points <br><br>";

echo "Hasil Klasifikasi: $classification";

?>
