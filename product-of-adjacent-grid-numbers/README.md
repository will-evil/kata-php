# Task

A grid of numbers with an equal height and width is given and your task is to find the largest possible product between four adjacent numbers in the same direction. The directions can be horizontal, vertical or diagonal.

Some example grids are shown below.

````text
04 04 04 04 01 01  |  04*04*04*04 = 256
01 01 01 01 01 01  |
01 01 01 01 01 01  |
01 01 01 01 01 01  |
01 01 01 01 01 01  |
01 01 01 01 01 01  |
-----------------------------------------------------------------
01 01 01 01 01 04  |  04*04*04*04 = 256
01 01 01 01 01 04  |
01 01 01 01 01 04  |
01 01 01 01 01 04  |
01 01 01 01 01 01  |
01 01 01 01 01 01  |
-----------------------------------------------------------------
04 01 01 01 01 01  |  04*04*04*04 = 256
01 04 01 01 01 01  |
01 01 04 01 01 01  |
01 01 01 04 01 01  |
01 01 01 01 01 01  |
01 01 01 01 01 01  |
-----------------------------------------------------------------
01 01 01 04 01 01  |  04*04*04*04 = 256
01 01 04 01 01 01  |
01 04 01 01 01 01  |
04 01 01 01 01 01  |
01 01 01 01 01 01  |
01 01 01 01 01 01  |
````
The smallest grid that can be given is 4x4 and the contained numbers will have a minimum value of 1 and a maximum value of 99.

A solution should be created to test all combinations of vertical, horizontal and diagonal lines.
