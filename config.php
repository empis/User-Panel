<?php
/////////////////// MySQL Information ////////////////////
$host = ""; //MySQL Host
$user = ""; // MySQL Username
$pass = ""; // MySQL Password
$database = ""; // Database name
//////////////////////////////////////////////////////////

//////////////////// User Database ////////////////////////
$moneyname = "kredity"; // Name of money/currency column
///////////////////////////////////////////////////////////


//////////////// InventorySQL Database ////////////////////
$InventorySQL = "inventory"; //Your InventorySQL Table
$viewlimit = 15; //How many items per page
$bankname = "Bank"; //Name of "Bank"
///////////////////////////////////////////////////////////

//////////////// Miscellaneous Settings ////////////////////
$currencyname = "Kredity"; //Currency name (what you want to call your currency)

function encryptPass ($raw)
{
$hash = sha1($raw); // Password encryption function. Edit if you need encryption different from default.
return $hash;
}

///////////////////////////////////////////////////////////

////////////////////// Price List ////////////////////////
// Format: [blockId],[damageValue],[blockName],[pricePerBlock]/n
//////////////////////////////////////////////////////////
$stock = "1,0,Stone,3/n
2,0,Grass,5/n
3,0,Dirt,2/n
4,0,Cobblestone,3/n
5,0,Wooden Plank,3/n
6,0,Sapling,12/n
7,0,Bedrock,0/n
8,0,Water,0/n
9,0,Stationary Water,0/n
10,0,Lava,0/n
11,0,Stationary Lava,0/n
12,0,Sand,8/n
13,0,Gravel,3/n
14,0,Gold Ore,50/n
15,0,Iron Ore,25/n
16,0,Coal Ore,15/n
17,0,Wood,8/n
18,0,Leaves,3/n
19,0,Sponge,300/n
20,0,Glass,10/n
21,0,Lapis Lazuli Ore,75/n
22,0,Lapis Lazuli Block,500/n
23,0,Dispenser,0/n
24,0,Sandstone,10/n
25,0,Note Block,100/n
26,0,Bed,25/n
27,0,Powered Rail,45/n
28,0,Detector Rail,45/n
29,0,Sticky Piston,80/n
30,0,Cobweb,0/n
31,0,Tall Grass,0/n
32,0,Dead Shrubs,0/n
33,0,Piston,50/n
34,0,Piston Extension,0/n
35,0,White Wool,5/n
35,1,Orange Wool,10/n
35,2,Magenta Wool,10/n
35,3,Light Blue Wool,10/n
35,4,Yellow Wool,10/n
35,5,Light Green Wool,10/n
35,6,Pink Wool,10/n
35,7,Gray Wool,10/n
35,8,Light Gray Wool,10/n
35,9,Cyan Wool,10/n
35,10,Purple Wool,10/n
35,11,Blue Wool,10/n
35,12,Brown Wool,10/n
35,13,Dark Green Wool,10/n
35,14,Red Wool,10/n
35,15,Black Wool,10/n
36,0,Block Moved By Piston,0/n
37,0,Dandelion,1/n
38,0,Rose,1/n
39,0,Brown Mushroom,1/n
40,0,Red Mushroom,1/n
41,0,Gold Block,425/n
42,0,Iron Block,200/n
43,0,Double Slabs,0/n
44,0,Slabs,5/n
45,0,Brick Block,20/n
46,0,TNT,0/n
47,0,Bookshelf,25/n
48,0,Moss Stone,35/n
49,0,Obsidian,50/n
50,0,Torch,5/n
51,0,Fire,0/n
52,0,Mob Spawner,1500/n
53,0,Wooden Stairs,15/n
54,0,Chest,10/n
55,0,Redstone Wire,25/n
56,0,Diamond Ore,75/n
57,0,Diamond Block,600/n
58,0,Crafting Table,10/n
59,0,Seeds,5/n
60,0,Farmland,15/n
61,0,Furnace,10/n
62,0,Burning Furnace,25/n
63,0,Sign Post,15/n
64,0,Wooden Door,10/n
59,0,Seeds,5/n
60,0,Farmland,15/n
61,0,Furnace,10/n
62,0,Burning,25/n
63,0,Sign Post,15/n
64,0,Wooden Door,10/n
65,0,Ladders,20/n
66,0,Rails,35/n
67,0,Cobblestone Stair,15/n
68,0,Wall Sign,15/n
69,0,Lever,20/n
70,0,Stone Preasure Plate,25/n
71,0,Iron Door,150/n
72,0,Wooden Preasure Plate,25/n
73,0,Redstone Ore,75/n
74,0,Glowing Redstone Ore,85/n
75,0,Redstone Torch (Off State),30/n
76,0,Redstone Torch (On State),30/n
77,0,Stone Button,15/n
78,0,Snow,65/n
79,0,Ice,75/n
80,0,Snow Block,70/n
81,0,Cactus,10/n
82,0,Clay Block,20/n
83,0,Sugar Cane,20/n
84,0,Jukebox,200/n
85,0,Fence,15/n
86,0,Pumkin,30/n
87,0,Netherrack,25/n
88,0,Soul Sand,25/n
89,0,Glowstone Block,150/n
90,0,Portal,0/n
91,0,Jack-O-Lantern,35/n
92,0,Cake Block,60/n
93,0,Redstone Repeater (Off State),65/n
94,0,Redstone Repeater (On State),65/n
95,0,Locked Chest,0/n
96,0,Trapdoor,15/n
256,0,Iron Shovel,75/n
257,0,Iron Pickaxe,75/n
258,0,Iron Axe,75/n
259,0,Flint and Steel,50/n
260,0,Red Aplle,20/n
261,0,Bow,40/n
262,0,Arrow,5/n
263,0,Coal,15/n
264,0,Diamond,75/n
265,0,Iron Ingot,50/n
266,0,Gold Ignot,65/n
267,0,Iron Sword,75/n
268,0,Wooden Sword,10/n
269,0,Wooden Shovel,10/n
270,0,Wooden Pickaxe,10/n
271,0,Wooden Axe,10/n
272,0,Stone Sword,25/n
273,0,Stone Shovel,25/n
274,0,Stone Pickaxe,25/n
275,0,Stone Axe,25/n
276,0,Diamond Sword,120/n
277,0,Diamond Shovel,120/n
278,0,Diamond Pickaxe,120/n
279,0,Diamond Axe,120/n
280,0,Stick,2/n
281,0,Bowl,10/n
282,0,Mushroom Soup,35/n
283,0,Gold Sword,100/n
284,0,Gold Shovel,100/n
285,0,Gold Pickaxe,100/n
286,0,Gold Axe,100/n
287,0,String,40/n
288,0,Feather,10/n
289,0,Gunpowder,0/n
290,0,Wooden Hoe,10/n
291,0,Stone Hoe,25/n
292,0,Iron Hoe,75/n
293,0,Diamond Hoe,120/n
294,0,Gold Hoe,100/n
295,0,Seeds,5/n
296,0,Wheat,15/n
297,0,Bread,30/n
298,0,Leather Cap,10/n
299,0,Leather Tunic,10/n
300,0,Leather Pants,10/n
301,0,Leather Boots,10/n
302,0,Chain Helmet,25/n
303,0,Chain Chestplate,25/n
304,0,Chain Leggings,25/n
305,0,Chain Boots,25/n
306,0,Iron Helmet,75/n
307,0,Iron Chestplate,75/n
308,0,Iron Leggings,75/n
309,0,Iron Boots,75/n
310,0,Diamond Helmet,120/n
311,0,Diamond Chestplate,120/n
312,0,Diamond Leggings,120/n
313,0,Diamond Boots,120/n
314,0,Gold Helmet,100/n
315,0,Gold Chestplate,100/n
316,0,Gold Leggings,100/n
317,0,Gold Boots,100/n
318,0,Flint,15/n
319,0,Raw Porkchop,8/n
320,0,Cooked Porkchop,10/n
321,0,Paintings,12/n
322,0,Golden Apple,130/n
323,0,Sign,15/n
324,0,Wooden door,10/n
325,0,Bucket,10/n
326,0,Water bucket,15/n
327,0,Lava bucket,20/n
328,0,Minecart,25/n
329,0,Saddle,650/n
330,0,Iron door,100/n
331,0,Redstone,15/n
332,0,Snowball,5/n
333,0,Boat,15/n
334,0,Leather,2/n
335,0,Milk,25/n
336,0,Clay Brick,20/n
337,0,Clay,5/n
338,0,Sugar Cane,20/n
339,0,Paper,15/n
340,0,Book,25/n
341,0,Slimeball,100/n
342,0,Minecart with Chest,45/n
343,0,Minecart with Furnace,45/n
344,0,Egg,10/n
345,0,Compass,100/n
346,0,Fishing Rod,45/n
347,0,Clock,100/n
348,0,Glowstone Dust,25/n
349,0,Raw Fish,8/n
350,0,Cooked Fish,10/n
351,0,Dye,10/n
352,0,Bone,15/n
353,0,Sugar,12/n
354,0,Cake,45/n
355,0,Bed,15/n
356,0,Redstone Reapter,25/n
357,0,Cookie,30/n
358,0,Map,100/n
359,0,Shears,35/n
2256,0,Gold Music Disc,1000/n
2257,0,Green Music Disc,1000/n
";
$vip = "10"; //How much will cost vip for 1 day
$render = "0,1,2,3,4,5,7,8,9,10,11,12,13,14,15,16,17,18,18d1,18d2,19,20,21,22,23,24,25,26,29,30,33,35,35d1,35d2,35d3,35d4,35d5,35d6,35d7,35d8,35d9,35d10,35d11,35d12,35d13,35d14,35d15,41,42,43,44,44d1,44d2,44d3,45,46,47,48,49,51,52,53,54,55,56,57,58,60,61,62,67,70,72,73,74,77,78,79,80,81,82,84,85,86,87,88,89,90,91,92,95,96";
///////////////////////////////////////////////////////////

// Open SQL connection (Don't edit this!)
mysql_connect($host,$user,$pass) OR die("Can't establish a connection with the MySQL server!");
mysql_select_db($database) OR die("The Database could not be selected!");

//xAuth checkPassword function
function checkPassword($realPass, $checkPass) {
	$saltPos = strlen($checkPass);
	$salt = substr($realPass, $saltPos, 12);
	$hash1 = hash('whirlpool', $salt . $checkPass);
	$hash2 = substr($hash1, 0, $saltPos). $salt . substr($hash1, $saltPos);
	return $hash2;
}

?>