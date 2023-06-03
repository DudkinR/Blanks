<?php

namespace Database\Seeders;

use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IconsSeeder extends Seeder
{
 /**
 * Run the database seeds.
 *
 * @return void
 */
    public function run()
    {
        $icons=[
        "icofont-angry-monster"=>
        "angry-monster",
        
        
        
        
        "icofont-bathtub"=>
        
        "bathtub",
        
        
        
        
        
        
        "icofont-bird-wings"=>
        
        "bird-wings",
        
        
        
        
        
        
        "icofont-bow"=>
        
        "bow",
        
        
        
        
        
        
        "icofont-castle"=>
        
        "castle",
        
        
        
        
        
        
        "icofont-circuit"=>
        
        "circuit",
        
        
        
        
        
        
        "icofont-crown-king"=>
        
        "crown-king",
        
        
        
        
        
        
        "icofont-crown-queen"=>
        
        "crown-queen",
        
        
        
        
        
        
        "icofont-dart"=>
        
        "dart",
        
        
        
        
        
        
        "icofont-disability-race"=>
        
        "disability-race",
        
        
        
        
        
        
        "icofont-diving-goggle"=>
        
        "diving-goggle",
        
        
        
        
        
        
        "icofont-eye-open"=>
        
        "eye-open",
        
        
        
        
        
        
        "icofont-flora-flower"=>
        
        "flora-flower",
        
        
        
        
        
        
        "icofont-flora"=>
        
        "flora",
        
        
        
        
        
        
        "icofont-gift-box"=>
        
        "gift-box",
        
        
        
        
        
        
        "icofont-halloween-pumpkin"=>
        
        "halloween-pumpkin",
        
        
        
        
        
        
        "icofont-hand-power"=>
        
        "hand-power",
        
        
        
        
        
        
        "icofont-hand-thunder"=>
        
        "hand-thunder",
        
        
        
        
        
        
        "icofont-king-monster"=>
        
        "king-monster",
        
        
        
        
        
        
        "icofont-love"=>
        
        "love",
        
        
        
        
        
        
        "icofont-magician-hat"=>
        
        "magician-hat",
        
        
        
        
        
        
        "icofont-native-american"=>
        
        "native-american",
        
        
        
        
        
        
        "icofont-owl-look"=>
        
        "owl-look",
        
        
        
        
        
        
        "icofont-phoenix"=>
        
        "phoenix",
        
        
        
        
        
        
        "icofont-robot-face"=>
        
        "robot-face",
        
        
        
        
        
        
        "icofont-sand-clock"=>
        
        "sand-clock",
        
        
        
        
        
        
        "icofont-shield-alt"=>
        
        "shield-alt",
        
        
        
        
        
        
        "icofont-ship-wheel"=>
        
        "ship-wheel",
        
        
        
        
        
        
        "icofont-skull-danger"=>
        
        "skull-danger",
        
        
        
        
        
        
        "icofont-skull-face"=>
        
        "skull-face",
        
        
        
        
        
        
        "icofont-snowmobile"=>
        
        "snowmobile",
        
        
        
        
        
        
        "icofont-space-shuttle"=>
        
        "space-shuttle",
        
        
        
        
        
        
        "icofont-star-shape"=>
        
        "star-shape",
        
        
        
        
        
        
        "icofont-swirl"=>
        
        "swirl",
        
        
        
        
        
        
        "icofont-tattoo-wing"=>
        
        "tattoo-wing",
        
        
        
        
        
        
        "icofont-throne"=>
        
        "throne",
        
        
        
        
        
        
        "icofont-tree-alt"=>
        
        "tree-alt",
        
        
        
        
        
        
        "icofont-triangle"=>
        
        "triangle",
        
        
        
        
        
        
        "icofont-unity-hand"=>
        
        "unity-hand",
        
        
        
        
        
        
        "icofont-weed"=>
        
        "weed",
        
        
        
        
        
        
        "icofont-woman-bird"=>
        
        "woman-bird",
        
        
        
        
        
        
        "icofont-bat"=>
        
        "bat",
        
        
        
        
        
        
        "icofont-bear-face"=>
        
        "bear-face",
        
        
        
        
        
        
        "icofont-bear-tracks"=>
        
        "bear-tracks",
        
        
        
        
        
        
        "icofont-bear"=>
        
        "bear",
        
        
        
        
        
        
        "icofont-bird-alt"=>
        
        "bird-alt",
        
        
        
        
        
        
        "icofont-bird-flying"=>
        
        "bird-flying",
        
        
        
        
        
        
        "icofont-bird"=>
        
        "bird",
        
        
        
        
        
        
        "icofont-birds"=>
        
        "birds",
        
        
        
        
        
        
        "icofont-bone"=>
        
        "bone",
        
        
        
        
        
        
        "icofont-bull"=>
        
        "bull",
        
        
        
        
        
        
        "icofont-butterfly-alt"=>
        
        "butterfly-alt",
        
        
        
        
        
        
        "icofont-butterfly"=>
        
        "butterfly",
        
        
        
        
        
        
        "icofont-camel-alt"=>
        
        "camel-alt",
        
        
        
        
        
        
        "icofont-camel-head"=>
        
        "camel-head",
        
        
        
        
        
        
        "icofont-camel"=>
        
        "camel",
        
        
        
        
        
        
        "icofont-cat-alt-1"=>
        
        "cat-alt-1",
        
        
        
        
        
        
        "icofont-cat-alt-2"=>
        
        "cat-alt-2",
        
        
        
        
        
        
        "icofont-cat-alt-3"=>
        
        "cat-alt-3",
        
        
        
        
        
        
        "icofont-cat-dog"=>
        
        "cat-dog",
        
        
        
        
        
        
        "icofont-cat-face"=>
        
        "cat-face",
        
        
        
        
        
        
        "icofont-cat"=>
        
        "cat",
        
        
        
        
        
        
        "icofont-cow-head"=>
        
        "cow-head",
        
        
        
        
        
        
        "icofont-cow"=>
        
        "cow",
        
        
        
        
        
        
        "icofont-crab"=>
        
        "crab",
        
        
        
        
        
        
        "icofont-crocodile"=>
        
        "crocodile",
        
        
        
        
        
        
        "icofont-deer-head"=>
        
        "deer-head",
        
        
        
        
        
        
        "icofont-dog-alt"=>
        
        "dog-alt",
        
        
        
        
        
        
        "icofont-dog-barking"=>
        
        "dog-barking",
        
        
        
        
        
        
        "icofont-dog"=>
        
        "dog",
        
        
        
        
        
        
        "icofont-dolphin"=>
        
        "dolphin",
        
        
        
        
        
        
        "icofont-duck-tracks"=>
        
        "duck-tracks",
        
        
        
        
        
        
        "icofont-eagle-head"=>
        
        "eagle-head",
        
        
        
        
        
        
        "icofont-eaten-fish"=>
        
        "eaten-fish",
        
        
        
        
        
        
        "icofont-elephant-alt"=>
        
        "elephant-alt",
        
        
        
        
        
        
        "icofont-elephant-head-alt"=>
        
        "elephant-head-alt",
        
        
        
        
        
        
        "icofont-elephant-head"=>
        
        "elephant-head",
        
        
        
        
        
        
        "icofont-elephant"=>
        
        "elephant",
        
        
        
        
        
        
        "icofont-elk"=>
        
        "elk",
        
        
        
        
        
        
        "icofont-fish-1"=>
        
        "fish-1",
        
        
        
        
        
        
        "icofont-fish-2"=>
        
        "fish-2",
        
        
        
        
        
        
        "icofont-fish-3"=>
        
        "fish-3",
        
        
        
        
        
        
        "icofont-fish-4"=>
        
        "fish-4",
        
        
        
        
        
        
        "icofont-fish-5"=>
        
        "fish-5",
        
        
        
        
        
        
        "icofont-fish"=>
        
        "fish",
        
        
        
        
        
        
        "icofont-fox-alt"=>
        
        "fox-alt",
        
        
        
        
        
        
        "icofont-fox"=>
        
        "fox",
        
        
        
        
        
        
        "icofont-frog-tracks"=>
        
        "frog-tracks",
        
        
        
        
        
        
        "icofont-frog"=>
        
        "frog",
        
        
        
        
        
        
        "icofont-froggy"=>
        
        "froggy",
        
        
        
        
        
        
        "icofont-giraffe-head-1"=>
        
        "giraffe-head-1",
        
        
        
        
        
        
        "icofont-giraffe-head-2"=>
        
        "giraffe-head-2",
        
        
        
        
        
        
        "icofont-giraffe-head"=>
        
        "giraffe-head",
        
        
        
        
        
        
        "icofont-giraffe"=>
        
        "giraffe",
        
        
        
        
        
        
        "icofont-goat-head"=>
        
        "goat-head",
        
        
        
        
        
        
        "icofont-gorilla"=>
        
        "gorilla",
        
        
        
        
        
        
        "icofont-hen-tracks"=>
        
        "hen-tracks",
        
        
        
        
        
        
        "icofont-horse-head-1"=>
        
        "horse-head-1",
        
        
        
        
        
        
        "icofont-horse-head-2"=>
        
        "horse-head-2",
        
        
        
        
        
        
        "icofont-horse-head"=>
        
        "horse-head",
        
        
        
        
        
        
        "icofont-horse-tracks"=>
        
        "horse-tracks",
        
        
        
        
        
        
        "icofont-jellyfish"=>
        
        "jellyfish",
        
        
        
        
        
        
        "icofont-kangaroo"=>
        
        "kangaroo",
        
        
        
        
        
        
        "icofont-lemur"=>
        
        "lemur",
        
        
        
        
        
        
        "icofont-lion-head-1"=>
        
        "lion-head-1",
        
        
        
        
        
        
        "icofont-lion-head-2"=>
        
        "lion-head-2",
        
        
        
        
        
        
        "icofont-lion-head"=>
        
        "lion-head",
        
        
        
        
        
        
        "icofont-lion"=>
        
        "lion",
        
        
        
        
        
        
        "icofont-monkey-2"=>
        
        "monkey-2",
        
        
        
        
        
        
        "icofont-monkey-3"=>
        
        "monkey-3",
        
        
        
        
        
        
        "icofont-monkey-face"=>
        
        "monkey-face",
        
        
        
        
        
        
        "icofont-monkey"=>
        
        "monkey",
        
        
        
        
        
        
        "icofont-octopus-alt"=>
        
        "octopus-alt",
        
        
        
        
        
        
        "icofont-octopus"=>
        
        "octopus",
        
        
        
        
        
        
        "icofont-owl"=>
        
        "owl",
        
        
        
        
        
        
        "icofont-panda-face"=>
        
        "panda-face",
        
        
        
        
        
        
        "icofont-panda"=>
        
        "panda",
        
        
        
        
        
        
        "icofont-panther"=>
        
        "panther",
        
        
        
        
        
        
        "icofont-parrot-lip"=>
        
        "parrot-lip",
        
        
        
        
        
        
        "icofont-parrot"=>
        
        "parrot",
        
        
        
        
        
        
        "icofont-paw"=>
        
        "paw",
        
        
        
        
        
        
        "icofont-pelican"=>
        
        "pelican",
        
        
        
        
        
        
        "icofont-penguin"=>
        
        "penguin",
        
        
        
        
        
        
        "icofont-pig-face"=>
        
        "pig-face",
        
        
        
        
        
        
        "icofont-pig"=>
        
        "pig",
        
        
        
        
        
        
        "icofont-pigeon-1"=>
        
        "pigeon-1",
        
        
        
        
        
        
        "icofont-pigeon-2"=>
        
        "pigeon-2",
        
        
        
        
        
        
        "icofont-pigeon"=>
        
        "pigeon",
        
        
        
        
        
        
        "icofont-rabbit"=>
        
        "rabbit",
        
        
        
        
        
        
        "icofont-rat"=>
        
        "rat",
        
        
        
        
        
        
        "icofont-rhino-head"=>
        
        "rhino-head",
        
        
        
        
        
        
        "icofont-rhino"=>
        
        "rhino",
        
        
        
        
        
        
        "icofont-rooster"=>
        
        "rooster",
        
        
        
        
        
        
        "icofont-seahorse"=>
        
        "seahorse",
        
        
        
        
        
        
        "icofont-seal"=>
        
        "seal",
        
        
        
        
        
        
        "icofont-shrimp-alt"=>
        
        "shrimp-alt",
        
        
        
        
        
        
        "icofont-shrimp"=>
        
        "shrimp",
        
        
        
        
        
        
        "icofont-snail-1"=>
        
        "snail-1",
        
        
        
        
        
        
        "icofont-snail-2"=>
        
        "snail-2",
        
        
        
        
        
        
        "icofont-snail-3"=>
        
        "snail-3",
        
        
        
        
        
        
        "icofont-snail"=>
        
        "snail",
        
        
        
        
        
        
        "icofont-snake"=>
        
        "snake",
        
        
        
        
        
        
        "icofont-squid"=>
        
        "squid",
        
        
        
        
        
        
        "icofont-squirrel"=>
        
        "squirrel",
        
        
        
        
        
        
        "icofont-tiger-face"=>
        
        "tiger-face",
        
        
        
        
        
        
        "icofont-tiger"=>
        
        "tiger",
        
        
        
        
        
        
        "icofont-turtle"=>
        
        "turtle",
        
        
        
        
        
        
        "icofont-whale"=>
        
        "whale",
        
        
        
        
        
        
        "icofont-woodpecker"=>
        
        "woodpecker",
        
        
        
        
        
        
        "icofont-zebra"=>
        
        "zebra",
        
        
        
        
        
        
        "icofont-brand-acer"=>
        
        "brand-acer",
        
        
        
        
        
        
        "icofont-brand-adidas"=>
        
        "brand-adidas",
        
        
        
        
        
        
        "icofont-brand-adobe"=>
        
        "brand-adobe",
        
        
        
        
        
        
        "icofont-brand-air-new-zealand"=>
        
        "brand-air-new-zealand",
        
        
        
        
        
        
        "icofont-brand-airbnb"=>
        
        "brand-airbnb",
        
        
        
        
        
        
        "icofont-brand-aircell"=>
        
        "brand-aircell",
        
        
        
        
        
        
        "icofont-brand-airtel"=>
        
        "brand-airtel",
        
        
        
        
        
        
        "icofont-brand-alcatel"=>
        
        "brand-alcatel",
        
        
        
        
        
        
        "icofont-brand-alibaba"=>
        
        "brand-alibaba",
        
        
        
        
        
        
        "icofont-brand-aliexpress"=>
        
        "brand-aliexpress",
        
        
        
        
        
        
        "icofont-brand-alipay"=>
        
        "brand-alipay",
        
        
        
        
        
        
        "icofont-brand-amazon"=>
        
        "brand-amazon",
        
        
        
        
        
        
        "icofont-brand-amd"=>
        
        "brand-amd",
        
        
        
        
        
        
        "icofont-brand-american-airlines"=>
        
        "brand-american-airlines",
        
        
        
        
        
        
        "icofont-brand-android-robot"=>
        
        "brand-android-robot",
        
        
        
        
        
        
        "icofont-brand-android"=>
        
        "brand-android",
        
        
        
        
        
        
        "icofont-brand-aol"=>
        
        "brand-aol",
        
        
        
        
        
        
        "icofont-brand-apple"=>
        
        "brand-apple",
        
        
        
        
        
        
        "icofont-brand-appstore"=>
        
        "brand-appstore",
        
        
        
        
        
        
        "icofont-brand-asus"=>
        
        "brand-asus",
        
        
        
        
        
        
        "icofont-brand-ati"=>
        
        "brand-ati",
        
        
        
        
        
        
        "icofont-brand-att"=>
        
        "brand-att",
        
        
        
        
        
        
        "icofont-brand-audi"=>
        
        "brand-audi",
        
        
        
        
        
        
        "icofont-brand-axiata"=>
        
        "brand-axiata",
        
        
        
        
        
        
        "icofont-brand-bada"=>
        
        "brand-bada",
        
        
        
        
        
        
        "icofont-brand-bbc"=>
        
        "brand-bbc",
        
        
        
        
        
        
        "icofont-brand-bing"=>
        
        "brand-bing",
        
        
        
        
        
        
        "icofont-brand-blackberry"=>
        
        "brand-blackberry",
        
        
        
        
        
        
        "icofont-brand-bmw"=>
        
        "brand-bmw",
        
        
        
        
        
        
        "icofont-brand-box"=>
        
        "brand-box",
        
        
        
        
        
        
        "icofont-brand-burger-king"=>
        
        "brand-burger-king",
        
        
        
        
        
        
        "icofont-brand-business-insider"=>
        
        "brand-business-insider",
        
        
        
        
        
        
        "icofont-brand-buzzfeed"=>
        
        "brand-buzzfeed",
        
        
        
        
        
        
        "icofont-brand-cannon"=>
        
        "brand-cannon",
        
        
        
        
        
        
        "icofont-brand-casio"=>
        
        "brand-casio",
        
        
        
        
        
        
        "icofont-brand-china-mobile"=>
        
        "brand-china-mobile",
        
        
        
        
        
        
        "icofont-brand-china-telecom"=>
        
        "brand-china-telecom",
        
        
        
        
        
        
        "icofont-brand-china-unicom"=>
        
        "brand-china-unicom",
        
        
        
        
        
        
        "icofont-brand-cisco"=>
        
        "brand-cisco",
        
        
        
        
        
        
        "icofont-brand-citibank"=>
        
        "brand-citibank",
        
        
        
        
        
        
        "icofont-brand-cnet"=>
        
        "brand-cnet",
        
        
        
        
        
        
        "icofont-brand-cnn"=>
        
        "brand-cnn",
        
        
        
        
        
        
        "icofont-brand-cocal-cola"=>
        
        "brand-cocal-cola",
        
        
        
        
        
        
        "icofont-brand-compaq"=>
        
        "brand-compaq",
        
        
        
        
        
        
        "icofont-brand-debian"=>
        
        "brand-debian",
        
        
        
        
        
        
        "icofont-brand-delicious"=>
        
        "brand-delicious",
        
        
        
        
        
        
        "icofont-brand-dell"=>
        
        "brand-dell",
        
        
        
        
        
        
        "icofont-brand-designbump"=>
        
        "brand-designbump",
        
        
        
        
        
        
        "icofont-brand-designfloat"=>
        
        "brand-designfloat",
        
        
        
        
        
        
        "icofont-brand-disney"=>
        
        "brand-disney",
        
        
        
        
        
        
        "icofont-brand-dodge"=>
        
        "brand-dodge",
        
        
        
        
        
        
        "icofont-brand-dove"=>
        
        "brand-dove",
        
        
        
        
        
        
        "icofont-brand-drupal"=>
        
        "brand-drupal",
        
        
        
        
        
        
        "icofont-brand-ebay"=>
        
        "brand-ebay",
        
        
        
        
        
        
        "icofont-brand-eleven"=>
        
        "brand-eleven",
        
        
        
        
        
        
        "icofont-brand-emirates"=>
        
        "brand-emirates",
        
        
        
        
        
        
        "icofont-brand-espn"=>
        
        "brand-espn",
        
        
        
        
        
        
        "icofont-brand-etihad-airways"=>
        
        "brand-etihad-airways",
        
        
        
        
        
        
        "icofont-brand-etisalat"=>
        
        "brand-etisalat",
        
        
        
        
        
        
        "icofont-brand-etsy"=>
        
        "brand-etsy",
        
        
        
        
        
        
        "icofont-brand-fastrack"=>
        
        "brand-fastrack",
        
        
        
        
        
        
        "icofont-brand-fedex"=>
        
        "brand-fedex",
        
        
        
        
        
        
        "icofont-brand-ferrari"=>
        
        "brand-ferrari",
        
        
        
        
        
        
        "icofont-brand-fitbit"=>
        
        "brand-fitbit",
        
        
        
        
        
        
        "icofont-brand-flikr"=>
        
        "brand-flikr",
        
        
        
        
        
        
        "icofont-brand-forbes"=>
        
        "brand-forbes",
        
        
        
        
        
        
        "icofont-brand-foursquare"=>
        
        "brand-foursquare",
        
        
        
        
        
        
        "icofont-brand-foxconn"=>
        
        "brand-foxconn",
        
        
        
        
        
        
        "icofont-brand-fujitsu"=>
        
        "brand-fujitsu",
        
        
        
        
        
        
        "icofont-brand-general-electric"=>
        
        "brand-general-electric",
        
        
        
        
        
        
        "icofont-brand-gillette"=>
        
        "brand-gillette",
        
        
        
        
        
        
        "icofont-brand-gizmodo"=>
        
        "brand-gizmodo",
        
        
        
        
        
        
        "icofont-brand-gnome"=>
        
        "brand-gnome",
        
        
        
        
        
        
        "icofont-brand-google"=>
        
        "brand-google",
        
        
        
        
        
        
        "icofont-brand-gopro"=>
        
        "brand-gopro",
        
        
        
        
        
        
        "icofont-brand-gucci"=>
        
        "brand-gucci",
        
        
        
        
        
        
        "icofont-brand-hallmark"=>
        
        "brand-hallmark",
        
        
        
        
        
        
        "icofont-brand-hi5"=>
        
        "brand-hi5",
        
        
        
        
        
        
        "icofont-brand-honda"=>
        
        "brand-honda",
        
        
        
        
        
        
        "icofont-brand-hp"=>
        
        "brand-hp",
        
        
        
        
        
        
        "icofont-brand-hsbc"=>
        
        "brand-hsbc",
        
        
        
        
        
        
        "icofont-brand-htc"=>
        
        "brand-htc",
        
        
        
        
        
        
        "icofont-brand-huawei"=>
        
        "brand-huawei",
        
        
        
        
        
        
        "icofont-brand-hulu"=>
        
        "brand-hulu",
        
        
        
        
        
        
        "icofont-brand-hyundai"=>
        
        "brand-hyundai",
        
        
        
        
        
        
        "icofont-brand-ibm"=>
        
        "brand-ibm",
        
        
        
        
        
        
        "icofont-brand-icofont"=>
        
        "brand-icofont",
        
        
        
        
        
        
        "icofont-brand-icq"=>
        
        "brand-icq",
        
        
        
        
        
        
        "icofont-brand-ikea"=>
        
        "brand-ikea",
        
        
        
        
        
        
        "icofont-brand-imdb"=>
        
        "brand-imdb",
        
        
        
        
        
        
        "icofont-brand-indiegogo"=>
        
        "brand-indiegogo",
        
        
        
        
        
        
        "icofont-brand-intel"=>
        
        "brand-intel",
        
        
        
        
        
        
        "icofont-brand-ipair"=>
        
        "brand-ipair",
        
        
        
        
        
        
        "icofont-brand-jaguar"=>
        
        "brand-jaguar",
        
        
        
        
        
        
        "icofont-brand-java"=>
        
        "brand-java",
        
        
        
        
        
        
        "icofont-brand-joomla"=>
        
        "brand-joomla",
        
        
        
        
        
        
        "icofont-brand-kickstarter"=>
        
        "brand-kickstarter",
        
        
        
        
        
        
        "icofont-brand-kik"=>
        
        "brand-kik",
        
        
        
        
        
        
        "icofont-brand-lastfm"=>
        
        "brand-lastfm",
        
        
        
        
        
        
        "icofont-brand-lego"=>
        
        "brand-lego",
        
        
        
        
        
        
        "icofont-brand-lenovo"=>
        
        "brand-lenovo",
        
        
        
        
        
        
        "icofont-brand-levis"=>
        
        "brand-levis",
        
        
        
        
        
        
        "icofont-brand-lexus"=>
        
        "brand-lexus",
        
        
        
        
        
        
        "icofont-brand-lg"=>
        
        "brand-lg",
        
        
        
        
        
        
        "icofont-brand-life-hacker"=>
        
        "brand-life-hacker",
        
        
        
        
        
        
        "icofont-brand-linux-mint"=>
        
        "brand-linux-mint",
        
        
        
        
        
        
        "icofont-brand-linux"=>
        
        "brand-linux",
        
        
        
        
        
        
        "icofont-brand-lionix"=>
        
        "brand-lionix",
        
        
        
        
        
        
        "icofont-brand-loreal"=>
        
        "brand-loreal",
        
        
        
        
        
        
        "icofont-brand-louis-vuitton"=>
        
        "brand-louis-vuitton",
        
        
        
        
        
        
        "icofont-brand-mac-os"=>
        
        "brand-mac-os",
        
        
        
        
        
        
        "icofont-brand-marvel-app"=>
        
        "brand-marvel-app",
        
        
        
        
        
        
        "icofont-brand-mashable"=>
        
        "brand-mashable",
        
        
        
        
        
        
        "icofont-brand-mazda"=>
        
        "brand-mazda",
        
        
        
        
        
        
        "icofont-brand-mcdonals"=>
        
        "brand-mcdonals",
        
        
        
        
        
        
        "icofont-brand-mercedes"=>
        
        "brand-mercedes",
        
        
        
        
        
        
        "icofont-brand-micromax"=>
        
        "brand-micromax",
        
        
        
        
        
        
        "icofont-brand-microsoft"=>
        
        "brand-microsoft",
        
        
        
        
        
        
        "icofont-brand-mobileme"=>
        
        "brand-mobileme",
        
        
        
        
        
        
        "icofont-brand-mobily"=>
        
        "brand-mobily",
        
        
        
        
        
        
        "icofont-brand-motorola"=>
        
        "brand-motorola",
        
        
        
        
        
        
        "icofont-brand-msi"=>
        
        "brand-msi",
        
        
        
        
        
        
        "icofont-brand-mts"=>
        
        "brand-mts",
        
        
        
        
        
        
        "icofont-brand-myspace"=>
        
        "brand-myspace",
        
        
        
        
        
        
        "icofont-brand-mytv"=>
        
        "brand-mytv",
        
        
        
        
        
        
        "icofont-brand-nasa"=>
        
        "brand-nasa",
        
        
        
        
        
        
        "icofont-brand-natgeo"=>
        
        "brand-natgeo",
        
        
        
        
        
        
        "icofont-brand-nbc"=>
        
        "brand-nbc",
        
        
        
        
        
        
        "icofont-brand-nescafe"=>
        
        "brand-nescafe",
        
        
        
        
        
        
        "icofont-brand-nestle"=>
        
        "brand-nestle",
        
        
        
        
        
        
        "icofont-brand-netflix"=>
        
        "brand-netflix",
        
        
        
        
        
        
        "icofont-brand-nexus"=>
        
        "brand-nexus",
        
        
        
        
        
        
        "icofont-brand-nike"=>
        
        "brand-nike",
        
        
        
        
        
        
        "icofont-brand-nokia"=>
        
        "brand-nokia",
        
        
        
        
        
        
        "icofont-brand-nvidia"=>
        
        "brand-nvidia",
        
        
        
        
        
        
        "icofont-brand-omega"=>
        
        "brand-omega",
        
        
        
        
        
        
        "icofont-brand-opensuse"=>
        
        "brand-opensuse",
        
        
        
        
        
        
        "icofont-brand-oracle"=>
        
        "brand-oracle",
        
        
        
        
        
        
        "icofont-brand-panasonic"=>
        
        "brand-panasonic",
        
        
        
        
        
        
        "icofont-brand-paypal"=>
        
        "brand-paypal",
        
        
        
        
        
        
        "icofont-brand-pepsi"=>
        
        "brand-pepsi",
        
        
        
        
        
        
        "icofont-brand-philips"=>
        
        "brand-philips",
        
        
        
        
        
        
        "icofont-brand-pizza-hut"=>
        
        "brand-pizza-hut",
        
        
        
        
        
        
        "icofont-brand-playstation"=>
        
        "brand-playstation",
        
        
        
        
        
        
        "icofont-brand-puma"=>
        
        "brand-puma",
        
        
        
        
        
        
        "icofont-brand-qatar-air"=>
        
        "brand-qatar-air",
        
        
        
        
        
        
        "icofont-brand-qvc"=>
        
        "brand-qvc",
        
        
        
        
        
        
        "icofont-brand-readernaut"=>
        
        "brand-readernaut",
        
        
        
        
        
        
        "icofont-brand-redbull"=>
        
        "brand-redbull",
        
        
        
        
        
        
        "icofont-brand-reebok"=>
        
        "brand-reebok",
        
        
        
        
        
        
        "icofont-brand-reuters"=>
        
        "brand-reuters",
        
        
        
        
        
        
        "icofont-brand-samsung"=>
        
        "brand-samsung",
        
        
        
        
        
        
        "icofont-brand-sap"=>
        
        "brand-sap",
        
        
        
        
        
        
        "icofont-brand-saudia-airlines"=>
        
        "brand-saudia-airlines",
        
        
        
        
        
        
        "icofont-brand-scribd"=>
        
        "brand-scribd",
        
        
        
        
        
        
        "icofont-brand-shell"=>
        
        "brand-shell",
        
        
        
        
        
        
        "icofont-brand-siemens"=>
        
        "brand-siemens",
        
        
        
        
        
        
        "icofont-brand-sk-telecom"=>
        
        "brand-sk-telecom",
        
        
        
        
        
        
        "icofont-brand-slideshare"=>
        
        "brand-slideshare",
        
        
        
        
        
        
        "icofont-brand-smashing-magazine"=>
        
        "brand-smashing-magazine",
        
        
        
        
        
        
        "icofont-brand-snapchat"=>
        
        "brand-snapchat",
        
        
        
        
        
        
        "icofont-brand-sony-ericsson"=>
        
        "brand-sony-ericsson",
        
        
        
        
        
        
        "icofont-brand-sony"=>
        
        "brand-sony",
        
        
        
        
        
        
        "icofont-brand-soundcloud"=>
        
        "brand-soundcloud",
        
        
        
        
        
        
        "icofont-brand-sprint"=>
        
        "brand-sprint",
        
        
        
        
        
        
        "icofont-brand-squidoo"=>
        
        "brand-squidoo",
        
        
        
        
        
        
        "icofont-brand-starbucks"=>
        
        "brand-starbucks",
        
        
        
        
        
        
        "icofont-brand-stc"=>
        
        "brand-stc",
        
        
        
        
        
        
        "icofont-brand-steam"=>
        
        "brand-steam",
        
        
        
        
        
        
        "icofont-brand-suzuki"=>
        
        "brand-suzuki",
        
        
        
        
        
        
        "icofont-brand-symbian"=>
        
        "brand-symbian",
        
        
        
        
        
        
        "icofont-brand-t-mobile"=>
        
        "brand-t-mobile",
        
        
        
        
        
        
        "icofont-brand-tango"=>
        
        "brand-tango",
        
        
        
        
        
        
        "icofont-brand-target"=>
        
        "brand-target",
        
        
        
        
        
        
        "icofont-brand-tata-indicom"=>
        
        "brand-tata-indicom",
        
        
        
        
        
        
        "icofont-brand-techcrunch"=>
        
        "brand-techcrunch",
        
        
        
        
        
        
        "icofont-brand-telenor"=>
        
        "brand-telenor",
        
        
        
        
        
        
        "icofont-brand-teliasonera"=>
        
        "brand-teliasonera",
        
        
        
        
        
        
        "icofont-brand-tesla"=>
        
        "brand-tesla",
        
        
        
        
        
        
        "icofont-brand-the-verge"=>
        
        "brand-the-verge",
        
        
        
        
        
        
        "icofont-brand-thenextweb"=>
        
        "brand-thenextweb",
        
        
        
        
        
        
        "icofont-brand-toshiba"=>
        
        "brand-toshiba",
        
        
        
        
        
        
        "icofont-brand-toyota"=>
        
        "brand-toyota",
        
        
        
        
        
        
        "icofont-brand-tribenet"=>
        
        "brand-tribenet",
        
        
        
        
        
        
        "icofont-brand-ubuntu"=>
        
        "brand-ubuntu",
        
        
        
        
        
        
        "icofont-brand-unilever"=>
        
        "brand-unilever",
        
        
        
        
        
        
        "icofont-brand-vaio"=>
        
        "brand-vaio",
        
        
        
        
        
        
        "icofont-brand-verizon"=>
        
        "brand-verizon",
        
        
        
        
        
        
        "icofont-brand-viber"=>
        
        "brand-viber",
        
        
        
        
        
        
        "icofont-brand-vodafone"=>
        
        "brand-vodafone",
        
        
        
        
        
        
        "icofont-brand-volkswagen"=>
        
        "brand-volkswagen",
        
        
        
        
        
        
        "icofont-brand-walmart"=>
        
        "brand-walmart",
        
        
        
        
        
        
        "icofont-brand-warnerbros"=>
        
        "brand-warnerbros",
        
        
        
        
        
        
        "icofont-brand-whatsapp"=>
        
        "brand-whatsapp",
        
        
        
        
        
        
        "icofont-brand-wikipedia"=>
        
        "brand-wikipedia",
        
        
        
        
        
        
        "icofont-brand-windows"=>
        
        "brand-windows",
        
        
        
        
        
        
        "icofont-brand-wire"=>
        
        "brand-wire",
        
        
        
        
        
        
        "icofont-brand-wordpress"=>
        
        "brand-wordpress",
        
        
        
        
        
        
        "icofont-brand-xiaomi"=>
        
        "brand-xiaomi",
        
        
        
        
        
        
        "icofont-brand-yahoobuzz"=>
        
        "brand-yahoobuzz",
        
        
        
        
        
        
        "icofont-brand-yamaha"=>
        
        "brand-yamaha",
        
        
        
        
        
        
        "icofont-brand-youtube"=>
        
        "brand-youtube",
        
        
        
        
        
        
        "icofont-brand-zain"=>
        
        "brand-zain",
        
        
        
        
        
        
        "icofont-bank-alt"=>
        
        "bank-alt",
        
        
        
        
        
        
        "icofont-bank"=>
        
        "bank",
        
        
        
        
        
        
        "icofont-barcode"=>
        
        "barcode",
        
        
        
        
        
        
        "icofont-bill-alt"=>
        
        "bill-alt",
        
        
        
        
        
        
        "icofont-billboard"=>
        
        "billboard",
        
        
        
        
        
        
        "icofont-briefcase-1"=>
        
        "briefcase-1",
        
        
        
        
        
        
        "icofont-briefcase-2"=>
        
        "briefcase-2",
        
        
        
        
        
        
        "icofont-businessman"=>
        
        "businessman",
        
        
        
        
        
        
        "icofont-businesswoman"=>
        
        "businesswoman",
        
        
        
        
        
        
        "icofont-chair"=>
        
        "chair",
        
        
        
        
        
        
        "icofont-coins"=>
        
        "coins",
        
        
        
        
        
        
        "icofont-company"=>
        
        "company",
        
        
        
        
        
        
        "icofont-contact-add"=>
        
        "contact-add",
        
        
        
        
        
        
        "icofont-files-stack"=>
        
        "files-stack",
        
        
        
        
        
        
        "icofont-handshake-deal"=>
        
        "handshake-deal",
        
        
        
        
        
        
        "icofont-id-card"=>
        
        "id-card",
        
        
        
        
        
        
        "icofont-meeting-add"=>
        
        "meeting-add",
        
        
        
        
        
        
        "icofont-money-bag"=>
        
        "money-bag",
        
        
        
        
        
        
        "icofont-pie-chart"=>
        
        "pie-chart",
        
        
        
        
        
        
        "icofont-presentation-alt"=>
        
        "presentation-alt",
        
        
        
        
        
        
        "icofont-presentation"=>
        
        "presentation",
        
        
        
        
        
        
        "icofont-stamp"=>
        
        "stamp",
        
        
        
        
        
        
        "icofont-stock-mobile"=>
        
        "stock-mobile",
        
        
        
        
        
        
        "icofont-chart-arrows-axis"=>
        
        "chart-arrows-axis",
        
        
        
        
        
        
        "icofont-chart-bar-graph"=>
        
        "chart-bar-graph",
        
        
        
        
        
        
        "icofont-chart-flow-1"=>
        
        "chart-flow-1",
        
        
        
        
        
        
        "icofont-chart-flow-2"=>
        
        "chart-flow-2",
        
        
        
        
        
        
        "icofont-chart-flow"=>
        
        "chart-flow",
        
        
        
        
        
        
        "icofont-chart-growth"=>
        
        "chart-growth",
        
        
        
        
        
        
        "icofont-chart-histogram-alt"=>
        
        "chart-histogram-alt",
        
        
        
        
        
        
        "icofont-chart-histogram"=>
        
        "chart-histogram",
        
        
        
        
        
        
        "icofont-chart-line-alt"=>
        
        "chart-line-alt",
        
        
        
        
        
        
        "icofont-chart-line"=>
        
        "chart-line",
        
        
        
        
        
        
        "icofont-chart-pie-alt"=>
        
        "chart-pie-alt",
        
        
        
        
        
        
        "icofont-chart-pie"=>
        
        "chart-pie",
        
        
        
        
        
        
        "icofont-chart-radar-graph"=>
        
        "chart-radar-graph",
        
        
        
        
        
        
        "icofont-architecture-alt"=>
        
        "architecture-alt",
        
        
        
        
        
        
        "icofont-architecture"=>
        
        "architecture",
        
        
        
        
        
        
        "icofont-barricade"=>
        
        "barricade",
        
        
        
        
        
        
        "icofont-bolt"=>
        
        "bolt",
        
        
        
        
        
        
        "icofont-bricks"=>
        
        "bricks",
        
        
        
        
        
        
        "icofont-building-alt"=>
        
        "building-alt",
        
        
        
        
        
        
        "icofont-bull-dozer"=>
        
        "bull-dozer",
        
        
        
        
        
        
        "icofont-calculations"=>
        
        "calculations",
        
        
        
        
        
        
        "icofont-cement-mix"=>
        
        "cement-mix",
        
        
        
        
        
        
        "icofont-cement-mixer"=>
        
        "cement-mixer",
        
        
        
        
        
        
        "icofont-concrete-mixer"=>
        
        "concrete-mixer",
        
        
        
        
        
        
        "icofont-danger-zone"=>
        
        "danger-zone",
        
        
        
        
        
        
        "icofont-drill"=>
        
        "drill",
        
        
        
        
        
        
        "icofont-eco-energy"=>
        
        "eco-energy",
        
        
        
        
        
        
        "icofont-eco-environmen"=>
        
        "eco-environmen",
        
        
        
        
        
        
        "icofont-energy-air"=>
        
        "energy-air",
        
        
        
        
        
        
        "icofont-energy-oil"=>
        
        "energy-oil",
        
        
        
        
        
        
        "icofont-energy-savings"=>
        
        "energy-savings",
        
        
        
        
        
        
        "icofont-energy-solar"=>
        
        "energy-solar",
        
        
        
        
        
        
        "icofont-energy-water"=>
        
        "energy-water",
        
        
        
        
        
        
        "icofont-engineer"=>
        
        "engineer",
        
        
        
        
        
        
        "icofont-fire-extinguisher-alt"=>
        
        "fire-extinguisher-alt",
        
        
        
        
        
        
        "icofont-fire-extinguisher"=>
        
        "fire-extinguisher",
        
        
        
        
        
        
        "icofont-fix-tools"=>
        
        "fix-tools",
        
        
        
        
        
        
        "icofont-fork-lift"=>
        
        "fork-lift",
        
        
        
        
        
        
        "icofont-glue-oil"=>
        
        "glue-oil",
        
        
        
        
        
        
        "icofont-hammer-alt"=>
        
        "hammer-alt",
        
        
        
        
        
        
        "icofont-hammer"=>
        
        "hammer",
        
        
        
        
        
        
        "icofont-help-robot"=>
        
        "help-robot",
        
        
        
        
        
        
        "icofont-industries-1"=>
        
        "industries-1",
        
        
        
        
        
        
        "icofont-industries-2"=>
        
        "industries-2",
        
        
        
        
        
        
        "icofont-industries-3"=>
        
        "industries-3",
        
        
        
        
        
        
        "icofont-industries-4"=>
        
        "industries-4",
        
        
        
        
        
        
        "icofont-industries-5"=>
        
        "industries-5",
        
        
        
        
        
        
        "icofont-industries"=>
        
        "industries",
        
        
        
        
        
        
        "icofont-labour"=>
        
        "labour",
        
        
        
        
        
        
        "icofont-mining"=>
        
        "mining",
        
        
        
        
        
        
        "icofont-paint-brush"=>
        
        "paint-brush",
        
        
        
        
        
        
        "icofont-pollution"=>
        
        "pollution",
        
        
        
        
        
        
        "icofont-power-zone"=>
        
        "power-zone",
        
        
        
        
        
        
        "icofont-radio-active"=>
        
        "radio-active",
        
        
        
        
        
        
        "icofont-recycle-alt"=>
        
        "recycle-alt",
        
        
        
        
        
        
        "icofont-recycling-man"=>
        
        "recycling-man",
        
        
        
        
        
        
        "icofont-safety-hat-light"=>
        
        "safety-hat-light",
        
        
        
        
        
        
        "icofont-safety-hat"=>
        
        "safety-hat",
        
        
        
        
        
        
        "icofont-saw"=>
        
        "saw",
        
        
        
        
        
        
        "icofont-screw-driver"=>
        
        "screw-driver",
        
        
        
        
        
        
        "icofont-tools-1"=>
        
        "tools-1",
        
        
        
        
        
        
        "icofont-tools-bag"=>
        
        "tools-bag",
        
        
        
        
        
        
        "icofont-tow-truck"=>
        
        "tow-truck",
        
        
        
        
        
        
        "icofont-trolley"=>
        
        "trolley",
        
        
        
        
        
        
        "icofont-trowel"=>
        
        "trowel",
        
        
        
        
        
        
        "icofont-under-construction-alt"=>
        
        "under-construction-alt",
        
        
        
        
        
        
        "icofont-under-construction"=>
        
        "under-construction",
        
        
        
        
        
        
        "icofont-vehicle-cement"=>
        
        "vehicle-cement",
        
        
        
        
        
        
        "icofont-vehicle-crane"=>
        
        "vehicle-crane",
        
        
        
        
        
        
        "icofont-vehicle-delivery-van"=>
        
        "vehicle-delivery-van",
        
        
        
        
        
        
        "icofont-vehicle-dozer"=>
        
        "vehicle-dozer",
        
        
        
        
        
        
        "icofont-vehicle-excavator"=>
        
        "vehicle-excavator",
        
        
        
        
        
        
        "icofont-vehicle-trucktor"=>
        
        "vehicle-trucktor",
        
        
        
        
        
        
        "icofont-vehicle-wrecking"=>
        
        "vehicle-wrecking",
        
        
        
        
        
        
        "icofont-worker"=>
        
        "worker",
        
        
        
        
        
        
        "icofont-workers-group"=>
        
        "workers-group",
        
        
        
        
        
        
        "icofont-wrench"=>
        
        "wrench",
        
        
        
        
        
        
        "icofont-afghani-false"=>
        
        "afghani-false",
        
        
        
        
        
        
        "icofont-afghani-minus"=>
        
        "afghani-minus",
        
        
        
        
        
        
        "icofont-afghani-plus"=>
        
        "afghani-plus",
        
        
        
        
        
        
        "icofont-afghani-true"=>
        
        "afghani-true",
        
        
        
        
        
        
        "icofont-afghani"=>
        
        "afghani",
        
        
        
        
        
        
        "icofont-baht-false"=>
        
        "baht-false",
        
        
        
        
        
        
        "icofont-baht-minus"=>
        
        "baht-minus",
        
        
        
        
        
        
        "icofont-baht-plus"=>
        
        "baht-plus",
        
        
        
        
        
        
        "icofont-baht-true"=>
        
        "baht-true",
        
        
        
        
        
        
        "icofont-baht"=>
        
        "baht",
        
        
        
        
        
        
        "icofont-bitcoin-false"=>
        
        "bitcoin-false",
        
        
        
        
        
        
        "icofont-bitcoin-minus"=>
        
        "bitcoin-minus",
        
        
        
        
        
        
        "icofont-bitcoin-plus"=>
        
        "bitcoin-plus",
        
        
        
        
        
        
        "icofont-bitcoin-true"=>
        
        "bitcoin-true",
        
        
        
        
        
        
        "icofont-bitcoin"=>
        
        "bitcoin",
        
        
        
        
        
        
        "icofont-dollar-flase"=>
        
        "dollar-flase",
        
        
        
        
        
        
        "icofont-dollar-minus"=>
        
        "dollar-minus",
        
        
        
        
        
        
        "icofont-dollar-plus"=>
        
        "dollar-plus",
        
        
        
        
        
        
        "icofont-dollar-true"=>
        
        "dollar-true",
        
        
        
        
        
        
        "icofont-dollar"=>
        
        "dollar",
        
        
        
        
        
        
        "icofont-dong-false"=>
        
        "dong-false",
        
        
        
        
        
        
        "icofont-dong-minus"=>
        
        "dong-minus",
        
        
        
        
        
        
        "icofont-dong-plus"=>
        
        "dong-plus",
        
        
        
        
        
        
        "icofont-dong-true"=>
        
        "dong-true",
        
        
        
        
        
        
        "icofont-dong"=>
        
        "dong",
        
        
        
        
        
        
        "icofont-euro-false"=>
        
        "euro-false",
        
        
        
        
        
        
        "icofont-euro-minus"=>
        
        "euro-minus",
        
        
        
        
        
        
        "icofont-euro-plus"=>
        
        "euro-plus",
        
        
        
        
        
        
        "icofont-euro-true"=>
        
        "euro-true",
        
        
        
        
        
        
        "icofont-euro"=>
        
        "euro",
        
        
        
        
        
        
        "icofont-frank-false"=>
        
        "frank-false",
        
        
        
        
        
        
        "icofont-frank-minus"=>
        
        "frank-minus",
        
        
        
        
        
        
        "icofont-frank-plus"=>
        
        "frank-plus",
        
        
        
        
        
        
        "icofont-frank-true"=>
        
        "frank-true",
        
        
        
        
        
        
        "icofont-frank"=>
        
        "frank",
        
        
        
        
        
        
        "icofont-hryvnia-false"=>
        
        "hryvnia-false",
        
        
        
        
        
        
        "icofont-hryvnia-minus"=>
        
        "hryvnia-minus",
        
        
        
        
        
        
        "icofont-hryvnia-plus"=>
        
        "hryvnia-plus",
        
        
        
        
        
        
        "icofont-hryvnia-true"=>
        
        "hryvnia-true",
        
        
        
        
        
        
        "icofont-hryvnia"=>
        
        "hryvnia",
        
        
        
        
        
        
        "icofont-lira-false"=>
        
        "lira-false",
        
        
        
        
        
        
        "icofont-lira-minus"=>
        
        "lira-minus",
        
        
        
        
        
        
        "icofont-lira-plus"=>
        
        "lira-plus",
        
        
        
        
        
        
        "icofont-lira-true"=>
        
        "lira-true",
        
        
        
        
        
        
        "icofont-lira"=>
        
        "lira",
        
        
        
        
        
        
        "icofont-peseta-false"=>
        
        "peseta-false",
        
        
        
        
        
        
        "icofont-peseta-minus"=>
        
        "peseta-minus",
        
        
        
        
        
        
        "icofont-peseta-plus"=>
        
        "peseta-plus",
        
        
        
        
        
        
        "icofont-peseta-true"=>
        
        "peseta-true",
        
        
        
        
        
        
        "icofont-peseta"=>
        
        "peseta",
        
        
        
        
        
        
        "icofont-peso-false"=>
        
        "peso-false",
        
        
        
        
        
        
        "icofont-peso-minus"=>
        
        "peso-minus",
        
        
        
        
        
        
        "icofont-peso-plus"=>
        
        "peso-plus",
        
        
        
        
        
        
        "icofont-peso-true"=>
        
        "peso-true",
        
        
        
        
        
        
        "icofont-peso"=>
        
        "peso",
        
        
        
        
        
        
        "icofont-pound-false"=>
        
        "pound-false",
        
        
        
        
        
        
        "icofont-pound-minus"=>
        
        "pound-minus",
        
        
        
        
        
        
        "icofont-pound-plus"=>
        
        "pound-plus",
        
        
        
        
        
        
        "icofont-pound-true"=>
        
        "pound-true",
        
        
        
        
        
        
        "icofont-pound"=>
        
        "pound",
        
        
        
        
        
        
        "icofont-renminbi-false"=>
        
        "renminbi-false",
        
        
        
        
        
        
        "icofont-renminbi-minus"=>
        
        "renminbi-minus",
        
        
        
        
        
        
        "icofont-renminbi-plus"=>
        
        "renminbi-plus",
        
        
        
        
        
        
        "icofont-renminbi-true"=>
        
        "renminbi-true",
        
        
        
        
        
        
        "icofont-renminbi"=>
        
        "renminbi",
        
        
        
        
        
        
        "icofont-riyal-false"=>
        
        "riyal-false",
        
        
        
        
        
        
        "icofont-riyal-minus"=>
        
        "riyal-minus",
        
        
        
        
        
        
        "icofont-riyal-plus"=>
        
        "riyal-plus",
        
        
        
        
        
        
        "icofont-riyal-true"=>
        
        "riyal-true",
        
        
        
        
        
        
        "icofont-riyal"=>
        
        "riyal",
        
        
        
        
        
        
        "icofont-rouble-false"=>
        
        "rouble-false",
        
        
        
        
        
        
        "icofont-rouble-minus"=>
        
        "rouble-minus",
        
        
        
        
        
        
        "icofont-rouble-plus"=>
        
        "rouble-plus",
        
        
        
        
        
        
        "icofont-rouble-true"=>
        
        "rouble-true",
        
        
        
        
        
        
        "icofont-rouble"=>
        
        "rouble",
        
        
        
        
        
        
        "icofont-rupee-false"=>
        
        "rupee-false",
        
        
        
        
        
        
        "icofont-rupee-minus"=>
        
        "rupee-minus",
        
        
        
        
        
        
        "icofont-rupee-plus"=>
        
        "rupee-plus",
        
        
        
        
        
        
        "icofont-rupee-true"=>
        
        "rupee-true",
        
        
        
        
        
        
        "icofont-rupee"=>
        
        "rupee",
        
        
        
        
        
        
        "icofont-taka-false"=>
        
        "taka-false",
        
        
        
        
        
        
        "icofont-taka-minus"=>
        
        "taka-minus",
        
        
        
        
        
        
        "icofont-taka-plus"=>
        
        "taka-plus",
        
        
        
        
        
        
        "icofont-taka-true"=>
        
        "taka-true",
        
        
        
        
        
        
        "icofont-taka"=>
        
        "taka",
        
        
        
        
        
        
        "icofont-turkish-lira-false"=>
        
        "turkish-lira-false",
        
        
        
        
        
        
        "icofont-turkish-lira-minus"=>
        
        "turkish-lira-minus",
        
        
        
        
        
        
        "icofont-turkish-lira-plus"=>
        
        "turkish-lira-plus",
        
        
        
        
        
        
        "icofont-turkish-lira-true"=>
        
        "turkish-lira-true",
        
        
        
        
        
        
        "icofont-turkish-lira"=>
        
        "turkish-lira",
        
        
        
        
        
        
        "icofont-won-false"=>
        
        "won-false",
        
        
        
        
        
        
        "icofont-won-minus"=>
        
        "won-minus",
        
        
        
        
        
        
        "icofont-won-plus"=>
        
        "won-plus",
        
        
        
        
        
        
        "icofont-won-true"=>
        
        "won-true",
        
        
        
        
        
        
        "icofont-won"=>
        
        "won",
        
        
        
        
        
        
        "icofont-yen-false"=>
        
        "yen-false",
        
        
        
        
        
        
        "icofont-yen-minus"=>
        
        "yen-minus",
        
        
        
        
        
        
        "icofont-yen-plus"=>
        
        "yen-plus",
        
        
        
        
        
        
        "icofont-yen-true"=>
        
        "yen-true",
        
        
        
        
        
        
        "icofont-yen"=>
        
        "yen",
        
        
        
        
        
        
        "icofont-android-nexus"=>
        
        "android-nexus",
        
        
        
        
        
        
        "icofont-android-tablet"=>
        
        "android-tablet",
        
        
        
        
        
        
        "icofont-apple-watch"=>
        
        "apple-watch",
        
        
        
        
        
        
        "icofont-drawing-tablet"=>
        
        "drawing-tablet",
        
        
        
        
        
        
        "icofont-earphone"=>
        
        "earphone",
        
        
        
        
        
        
        "icofont-flash-drive"=>
        
        "flash-drive",
        
        
        
        
        
        
        "icofont-game-console"=>
        
        "game-console",
        
        
        
        
        
        
        "icofont-game-controller"=>
        
        "game-controller",
        
        
        
        
        
        
        "icofont-game-pad"=>
        
        "game-pad",
        
        
        
        
        
        
        "icofont-game"=>
        
        "game",
        
        
        
        
        
        
        "icofont-headphone-alt-1"=>
        
        "headphone-alt-1",
        
        
        
        
        
        
        "icofont-headphone-alt-2"=>
        
        "headphone-alt-2",
        
        
        
        
        
        
        "icofont-headphone-alt-3"=>
        
        "headphone-alt-3",
        
        
        
        
        
        
        "icofont-headphone-alt"=>
        
        "headphone-alt",
        
        
        
        
        
        
        "icofont-headphone"=>
        
        "headphone",
        
        
        
        
        
        
        "icofont-htc-one"=>
        
        "htc-one",
        
        
        
        
        
        
        "icofont-imac"=>
        
        "imac",
        
        
        
        
        
        
        "icofont-ipad"=>
        
        "ipad",
        
        
        
        
        
        
        "icofont-iphone"=>
        
        "iphone",
        
        
        
        
        
        
        "icofont-ipod-nano"=>
        
        "ipod-nano",
        
        
        
        
        
        
        "icofont-ipod-touch"=>
        
        "ipod-touch",
        
        
        
        
        
        
        "icofont-keyboard-alt"=>
        
        "keyboard-alt",
        
        
        
        
        
        
        "icofont-keyboard-wireless"=>
        
        "keyboard-wireless",
        
        
        
        
        
        
        "icofont-keyboard"=>
        
        "keyboard",
        
        
        
        
        
        
        "icofont-laptop-alt"=>
        
        "laptop-alt",
        
        
        
        
        
        
        "icofont-laptop"=>
        
        "laptop",
        
        
        
        
        
        
        "icofont-macbook"=>
        
        "macbook",
        
        
        
        
        
        
        "icofont-magic-mouse"=>
        
        "magic-mouse",
        
        
        
        
        
        
        "icofont-micro-chip"=>
        
        "micro-chip",
        
        
        
        
        
        
        "icofont-microphone-alt"=>
        
        "microphone-alt",
        
        
        
        
        
        
        "icofont-microphone"=>
        
        "microphone",
        
        
        
        
        
        
        "icofont-monitor"=>
        
        "monitor",
        
        
        
        
        
        
        "icofont-mouse"=>
        
        "mouse",
        
        
        
        
        
        
        "icofont-mp3-player"=>
        
        "mp3-player",
        
        
        
        
        
        
        "icofont-nintendo"=>
        
        "nintendo",
        
        
        
        
        
        
        "icofont-playstation-alt"=>
        
        "playstation-alt",
        
        
        
        
        
        
        "icofont-psvita"=>
        
        "psvita",
        
        
        
        
        
        
        "icofont-radio-mic"=>
        
        "radio-mic",
        
        
        
        
        
        
        "icofont-radio"=>
        
        "radio",
        
        
        
        
        
        
        "icofont-refrigerator"=>
        
        "refrigerator",
        
        
        
        
        
        
        "icofont-samsung-galaxy"=>
        
        "samsung-galaxy",
        
        
        
        
        
        
        "icofont-surface-tablet"=>
        
        "surface-tablet",
        
        
        
        
        
        
        "icofont-ui-head-phone"=>
        
        "ui-head-phone",
        
        
        
        
        
        
        "icofont-ui-keyboard"=>
        
        "ui-keyboard",
        
        
        
        
        
        
        "icofont-washing-machine"=>
        
        "washing-machine",
        
        
        
        
        
        
        "icofont-wifi-router"=>
        
        "wifi-router",
        
        
        
        
        
        
        "icofont-wii-u"=>
        
        "wii-u",
        
        
        
        
        
        
        "icofont-windows-lumia"=>
        
        "windows-lumia",
        
        
        
        
        
        
        "icofont-wireless-mouse"=>
        
        "wireless-mouse",
        
        
        
        
        
        
        "icofont-xbox-360"=>
        
        "xbox-360",
        
        
        
        
        
        
        "icofont-arrow-down"=>
        
        "arrow-down",
        
        
        
        
        
        
        "icofont-arrow-left"=>
        
        "arrow-left",
        
        
        
        
        
        
        "icofont-arrow-right"=>
        
        "arrow-right",
        
        
        
        
        
        
        "icofont-arrow-up"=>
        
        "arrow-up",
        
        
        
        
        
        
        "icofont-block-down"=>
        
        "block-down",
        
        
        
        
        
        
        "icofont-block-left"=>
        
        "block-left",
        
        
        
        
        
        
        "icofont-block-right"=>
        
        "block-right",
        
        
        
        
        
        
        "icofont-block-up"=>
        
        "block-up",
        
        
        
        
        
        
        "icofont-bubble-down"=>
        
        "bubble-down",
        
        
        
        
        
        
        "icofont-bubble-left"=>
        
        "bubble-left",
        
        
        
        
        
        
        "icofont-bubble-right"=>
        
        "bubble-right",
        
        
        
        
        
        
        "icofont-bubble-up"=>
        
        "bubble-up",
        
        
        
        
        
        
        "icofont-caret-down"=>
        
        "caret-down",
        
        
        
        
        
        
        "icofont-caret-left"=>
        
        "caret-left",
        
        
        
        
        
        
        "icofont-caret-right"=>
        
        "caret-right",
        
        
        
        
        
        
        "icofont-caret-up"=>
        
        "caret-up",
        
        
        
        
        
        
        "icofont-circled-down"=>
        
        "circled-down",
        
        
        
        
        
        
        "icofont-circled-left"=>
        
        "circled-left",
        
        
        
        
        
        
        "icofont-circled-right"=>
        
        "circled-right",
        
        
        
        
        
        
        "icofont-circled-up"=>
        
        "circled-up",
        
        
        
        
        
        
        "icofont-collapse"=>
        
        "collapse",
        
        
        
        
        
        
        "icofont-cursor-drag"=>
        
        "cursor-drag",
        
        
        
        
        
        
        "icofont-curved-double-left"=>
        
        "curved-double-left",
        
        
        
        
        
        
        "icofont-curved-double-right"=>
        
        "curved-double-right",
        
        
        
        
        
        
        "icofont-curved-down"=>
        
        "curved-down",
        
        
        
        
        
        
        "icofont-curved-left"=>
        
        "curved-left",
        
        
        
        
        
        
        "icofont-curved-right"=>
        
        "curved-right",
        
        
        
        
        
        
        "icofont-curved-up"=>
        
        "curved-up",
        
        
        
        
        
        
        "icofont-dotted-down"=>
        
        "dotted-down",
        
        
        
        
        
        
        "icofont-dotted-left"=>
        
        "dotted-left",
        
        
        
        
        
        
        "icofont-dotted-right"=>
        
        "dotted-right",
        
        
        
        
        
        
        "icofont-dotted-up"=>
        
        "dotted-up",
        
        
        
        
        
        
        "icofont-double-left"=>
        
        "double-left",
        
        
        
        
        
        
        "icofont-double-right"=>
        
        "double-right",
        
        
        
        
        
        
        "icofont-expand-alt"=>
        
        "expand-alt",
        
        
        
        
        
        
        "icofont-hand-down"=>
        
        "hand-down",
        
        
        
        
        
        
        "icofont-hand-drag"=>
        
        "hand-drag",
        
        
        
        
        
        
        "icofont-hand-drag1"=>
        
        "hand-drag1",
        
        
        
        
        
        
        "icofont-hand-drag2"=>
        
        "hand-drag2",
        
        
        
        
        
        
        "icofont-hand-drawn-alt-down"=>
        
        "hand-drawn-alt-down",
        
        
        
        
        
        
        "icofont-hand-drawn-alt-left"=>
        
        "hand-drawn-alt-left",
        
        
        
        
        
        
        "icofont-hand-drawn-alt-right"=>
        
        "hand-drawn-alt-right",
        
        
        
        
        
        
        "icofont-hand-drawn-alt-up"=>
        
        "hand-drawn-alt-up",
        
        
        
        
        
        
        "icofont-hand-drawn-down"=>
        
        "hand-drawn-down",
        
        
        
        
        
        
        "icofont-hand-drawn-left"=>
        
        "hand-drawn-left",
        
        
        
        
        
        
        "icofont-hand-drawn-right"=>
        
        "hand-drawn-right",
        
        
        
        
        
        
        "icofont-hand-drawn-up"=>
        
        "hand-drawn-up",
        
        
        
        
        
        
        "icofont-hand-grippers"=>
        
        "hand-grippers",
        
        
        
        
        
        
        "icofont-hand-left"=>
        
        "hand-left",
        
        
        
        
        
        
        "icofont-hand-right"=>
        
        "hand-right",
        
        
        
        
        
        
        "icofont-hand-up"=>
        
        "hand-up",
        
        
        
        
        
        
        "icofont-line-block-down"=>
        
        "line-block-down",
        
        
        
        
        
        
        "icofont-line-block-left"=>
        
        "line-block-left",
        
        
        
        
        
        
        "icofont-line-block-right"=>
        
        "line-block-right",
        
        
        
        
        
        
        "icofont-line-block-up"=>
        
        "line-block-up",
        
        
        
        
        
        
        "icofont-long-arrow-down"=>
        
        "long-arrow-down",
        
        
        
        
        
        
        "icofont-long-arrow-left"=>
        
        "long-arrow-left",
        
        
        
        
        
        
        "icofont-long-arrow-right"=>
        
        "long-arrow-right",
        
        
        
        
        
        
        "icofont-long-arrow-up"=>
        
        "long-arrow-up",
        
        
        
        
        
        
        "icofont-rounded-collapse"=>
        
        "rounded-collapse",
        
        
        
        
        
        
        "icofont-rounded-double-left"=>
        
        "rounded-double-left",
        
        
        
        
        
        
        "icofont-rounded-double-right"=>
        
        "rounded-double-right",
        
        
        
        
        
        
        "icofont-rounded-down"=>
        
        "rounded-down",
        
        
        
        
        
        
        "icofont-rounded-expand"=>
        
        "rounded-expand",
        
        
        
        
        
        
        "icofont-rounded-left-down"=>
        
        "rounded-left-down",
        
        
        
        
        
        
        "icofont-rounded-left-up"=>
        
        "rounded-left-up",
        
        
        
        
        
        
        "icofont-rounded-left"=>
        
        "rounded-left",
        
        
        
        
        
        
        "icofont-rounded-right-down"=>
        
        "rounded-right-down",
        
        
        
        
        
        
        "icofont-rounded-right-up"=>
        
        "rounded-right-up",
        
        
        
        
        
        
        "icofont-rounded-right"=>
        
        "rounded-right",
        
        
        
        
        
        
        "icofont-rounded-up"=>
        
        "rounded-up",
        
        
        
        
        
        
        "icofont-scroll-bubble-down"=>
        
        "scroll-bubble-down",
        
        
        
        
        
        
        "icofont-scroll-bubble-left"=>
        
        "scroll-bubble-left",
        
        
        
        
        
        
        "icofont-scroll-bubble-right"=>
        
        "scroll-bubble-right",
        
        
        
        
        
        
        "icofont-scroll-bubble-up"=>
        
        "scroll-bubble-up",
        
        
        
        
        
        
        "icofont-scroll-double-down"=>
        
        "scroll-double-down",
        
        
        
        
        
        
        "icofont-scroll-double-left"=>
        
        "scroll-double-left",
        
        
        
        
        
        
        "icofont-scroll-double-right"=>
        
        "scroll-double-right",
        
        
        
        
        
        
        "icofont-scroll-double-up"=>
        
        "scroll-double-up",
        
        
        
        
        
        
        "icofont-scroll-down"=>
        
        "scroll-down",
        
        
        
        
        
        
        "icofont-scroll-left"=>
        
        "scroll-left",
        
        
        
        
        
        
        "icofont-scroll-long-down"=>
        
        "scroll-long-down",
        
        
        
        
        
        
        "icofont-scroll-long-left"=>
        
        "scroll-long-left",
        
        
        
        
        
        
        "icofont-scroll-long-right"=>
        
        "scroll-long-right",
        
        
        
        
        
        
        "icofont-scroll-long-up"=>
        
        "scroll-long-up",
        
        
        
        
        
        
        "icofont-scroll-right"=>
        
        "scroll-right",
        
        
        
        
        
        
        "icofont-scroll-up"=>
        
        "scroll-up",
        
        
        
        
        
        
        "icofont-simple-down"=>
        
        "simple-down",
        
        
        
        
        
        
        "icofont-simple-left-down"=>
        
        "simple-left-down",
        
        
        
        
        
        
        "icofont-simple-left-up"=>
        
        "simple-left-up",
        
        
        
        
        
        
        "icofont-simple-left"=>
        
        "simple-left",
        
        
        
        
        
        
        "icofont-simple-right-down"=>
        
        "simple-right-down",
        
        
        
        
        
        
        "icofont-simple-right-up"=>
        
        "simple-right-up",
        
        
        
        
        
        
        "icofont-simple-right"=>
        
        "simple-right",
        
        
        
        
        
        
        "icofont-simple-up"=>
        
        "simple-up",
        
        
        
        
        
        
        "icofont-square-down"=>
        
        "square-down",
        
        
        
        
        
        
        "icofont-square-left"=>
        
        "square-left",
        
        
        
        
        
        
        "icofont-square-right"=>
        
        "square-right",
        
        
        
        
        
        
        "icofont-square-up"=>
        
        "square-up",
        
        
        
        
        
        
        "icofont-stylish-down"=>
        
        "stylish-down",
        
        
        
        
        
        
        "icofont-stylish-left"=>
        
        "stylish-left",
        
        
        
        
        
        
        "icofont-stylish-right"=>
        
        "stylish-right",
        
        
        
        
        
        
        "icofont-stylish-up"=>
        
        "stylish-up",
        
        
        
        
        
        
        "icofont-swoosh-down"=>
        
        "swoosh-down",
        
        
        
        
        
        
        "icofont-swoosh-left"=>
        
        "swoosh-left",
        
        
        
        
        
        
        "icofont-swoosh-right"=>
        
        "swoosh-right",
        
        
        
        
        
        
        "icofont-swoosh-up"=>
        
        "swoosh-up",
        
        
        
        
        
        
        "icofont-thin-double-left"=>
        
        "thin-double-left",
        
        
        
        
        
        
        "icofont-thin-double-right"=>
        
        "thin-double-right",
        
        
        
        
        
        
        "icofont-thin-down"=>
        
        "thin-down",
        
        
        
        
        
        
        "icofont-thin-left"=>
        
        "thin-left",
        
        
        
        
        
        
        "icofont-thin-right"=>
        
        "thin-right",
        
        
        
        
        
        
        "icofont-thin-up"=>
        
        "thin-up",
        
        
        
        
        
        
        "icofont-abc"=>
        
        "abc",
        
        
        
        
        
        
        "icofont-atom"=>
        
        "atom",
        
        
        
        
        
        
        "icofont-award"=>
        
        "award",
        
        
        
        
        
        
        "icofont-bell-alt"=>
        
        "bell-alt",
        
        
        
        
        
        
        "icofont-black-board"=>
        
        "black-board",
        
        
        
        
        
        
        "icofont-book-alt"=>
        
        "book-alt",
        
        
        
        
        
        
        "icofont-book"=>
        
        "book",
        
        
        
        
        
        
        "icofont-brainstorming"=>
        
        "brainstorming",
        
        
        
        
        
        
        "icofont-certificate-alt-1"=>
        
        "certificate-alt-1",
        
        
        
        
        
        
        "icofont-certificate-alt-2"=>
        
        "certificate-alt-2",
        
        
        
        
        
        
        "icofont-certificate"=>
        
        "certificate",
        
        
        
        
        
        
        "icofont-education"=>
        
        "education",
        
        
        
        
        
        
        "icofont-electron"=>
        
        "electron",
        
        
        
        
        
        
        "icofont-fountain-pen"=>
        
        "fountain-pen",
        
        
        
        
        
        
        "icofont-globe-alt"=>
        
        "globe-alt",
        
        
        
        
        
        
        "icofont-graduate-alt"=>
        
        "graduate-alt",
        
        
        
        
        
        
        "icofont-graduate"=>
        
        "graduate",
        
        
        
        
        
        
        "icofont-group-students"=>
        
        "group-students",
        
        
        
        
        
        
        "icofont-hat-alt"=>
        
        "hat-alt",
        
        
        
        
        
        
        "icofont-hat"=>
        
        "hat",
        
        
        
        
        
        
        "icofont-instrument"=>
        
        "instrument",
        
        
        
        
        
        
        "icofont-lamp-light"=>
        
        "lamp-light",
        
        
        
        
        
        
        "icofont-medal"=>
        
        "medal",
        
        
        
        
        
        
        "icofont-microscope-alt"=>
        
        "microscope-alt",
        
        
        
        
        
        
        "icofont-microscope"=>
        
        "microscope",
        
        
        
        
        
        
        "icofont-paper"=>
        
        "paper",
        
        
        
        
        
        
        "icofont-pen-alt-4"=>
        
        "pen-alt-4",
        
        
        
        
        
        
        "icofont-pen-nib"=>
        
        "pen-nib",
        
        
        
        
        
        
        "icofont-pencil-alt-5"=>
        
        "pencil-alt-5",
        
        
        
        
        
        
        "icofont-quill-pen"=>
        
        "quill-pen",
        
        
        
        
        
        
        "icofont-read-book-alt"=>
        
        "read-book-alt",
        
        
        
        
        
        
        "icofont-read-book"=>
        
        "read-book",
        
        
        
        
        
        
        "icofont-school-bag"=>
        
        "school-bag",
        
        
        
        
        
        
        "icofont-school-bus"=>
        
        "school-bus",
        
        
        
        
        
        
        "icofont-student-alt"=>
        
        "student-alt",
        
        
        
        
        
        
        "icofont-student"=>
        
        "student",
        
        
        
        
        
        
        "icofont-teacher"=>
        
        "teacher",
        
        
        
        
        
        
        "icofont-test-bulb"=>
        
        "test-bulb",
        
        
        
        
        
        
        "icofont-test-tube-alt"=>
        
        "test-tube-alt",
        
        
        
        
        
        
        "icofont-university"=>
        
        "university",
        
        
        
        
        
        
        "icofont-angry"=>
        
        "angry",
        
        
        
        
        
        
        "icofont-astonished"=>
        
        "astonished",
        
        
        
        
        
        
        "icofont-confounded"=>
        
        "confounded",
        
        
        
        
        
        
        "icofont-confused"=>
        
        "confused",
        
        
        
        
        
        
        "icofont-crying"=>
        
        "crying",
        
        
        
        
        
        
        "icofont-dizzy"=>
        
        "dizzy",
        
        
        
        
        
        
        "icofont-expressionless"=>
        
        "expressionless",
        
        
        
        
        
        
        "icofont-heart-eyes"=>
        
        "heart-eyes",
        
        
        
        
        
        
        "icofont-laughing"=>
        
        "laughing",
        
        
        
        
        
        
        "icofont-nerd-smile"=>
        
        "nerd-smile",
        
        
        
        
        
        
        "icofont-open-mouth"=>
        
        "open-mouth",
        
        
        
        
        
        
        "icofont-rage"=>
        
        "rage",
        
        
        
        
        
        
        "icofont-rolling-eyes"=>
        
        "rolling-eyes",
        
        
        
        
        
        
        "icofont-sad"=>
        
        "sad",
        
        
        
        
        
        
        "icofont-simple-smile"=>
        
        "simple-smile",
        
        
        
        
        
        
        "icofont-slightly-smile"=>
        
        "slightly-smile",
        
        
        
        
        
        
        "icofont-smirk"=>
        
        "smirk",
        
        
        
        
        
        
        "icofont-stuck-out-tongue"=>
        
        "stuck-out-tongue",
        
        
        
        
        
        
        "icofont-wink-smile"=>
        
        "wink-smile",
        
        
        
        
        
        
        "icofont-worried"=>
        
        "worried",
        
        
        
        
        
        
        "icofont-file-alt"=>
        
        "file-alt",
        
        
        
        
        
        
        "icofont-file-audio"=>
        
        "file-audio",
        
        
        
        
        
        
        "icofont-file-avi-mp4"=>
        
        "file-avi-mp4",
        
        
        
        
        
        
        "icofont-file-bmp"=>
        
        "file-bmp",
        
        
        
        
        
        
        "icofont-file-code"=>
        
        "file-code",
        
        
        
        
        
        
        "icofont-file-css"=>
        
        "file-css",
        
        
        
        
        
        
        "icofont-file-document"=>
        
        "file-document",
        
        
        
        
        
        
        "icofont-file-eps"=>
        
        "file-eps",
        
        
        
        
        
        
        "icofont-file-excel"=>
        
        "file-excel",
        
        
        
        
        
        
        "icofont-file-exe"=>
        
        "file-exe",
        
        
        
        
        
        
        "icofont-file-file"=>
        
        "file-file",
        
        
        
        
        
        
        "icofont-file-flv"=>
        
        "file-flv",
        
        
        
        
        
        
        "icofont-file-gif"=>
        
        "file-gif",
        
        
        
        
        
        
        "icofont-file-html5"=>
        
        "file-html5",
        
        
        
        
        
        
        "icofont-file-image"=>
        
        "file-image",
        
        
        
        
        
        
        "icofont-file-iso"=>
        
        "file-iso",
        
        
        
        
        
        
        "icofont-file-java"=>
        
        "file-java",
        
        
        
        
        
        
        "icofont-file-javascript"=>
        
        "file-javascript",
        
        
        
        
        
        
        "icofont-file-jpg"=>
        
        "file-jpg",
        
        
        
        
        
        
        "icofont-file-midi"=>
        
        "file-midi",
        
        
        
        
        
        
        "icofont-file-mov"=>
        
        "file-mov",
        
        
        
        
        
        
        "icofont-file-mp3"=>
        
        "file-mp3",
        
        
        
        
        
        
        "icofont-file-pdf"=>
        
        "file-pdf",
        
        
        
        
        
        
        "icofont-file-php"=>
        
        "file-php",
        
        
        
        
        
        
        "icofont-file-png"=>
        
        "file-png",
        
        
        
        
        
        
        "icofont-file-powerpoint"=>
        
        "file-powerpoint",
        
        
        
        
        
        
        "icofont-file-presentation"=>
        
        "file-presentation",
        
        
        
        
        
        
        "icofont-file-psb"=>
        
        "file-psb",
        
        
        
        
        
        
        "icofont-file-psd"=>
        
        "file-psd",
        
        
        
        
        
        
        "icofont-file-python"=>
        
        "file-python",
        
        
        
        
        
        
        "icofont-file-ruby"=>
        
        "file-ruby",
        
        
        
        
        
        
        "icofont-file-spreadsheet"=>
        
        "file-spreadsheet",
        
        
        
        
        
        
        "icofont-file-sql"=>
        
        "file-sql",
        
        
        
        
        
        
        "icofont-file-svg"=>
        
        "file-svg",
        
        
        
        
        
        
        "icofont-file-text"=>
        
        "file-text",
        
        
        
        
        
        
        "icofont-file-tiff"=>
        
        "file-tiff",
        
        
        
        
        
        
        "icofont-file-video"=>
        
        "file-video",
        
        
        
        
        
        
        "icofont-file-wave"=>
        
        "file-wave",
        
        
        
        
        
        
        "icofont-file-wmv"=>
        
        "file-wmv",
        
        
        
        
        
        
        "icofont-file-word"=>
        
        "file-word",
        
        
        
        
        
        
        "icofont-file-zip"=>
        
        "file-zip",
        
        
        
        
        
        
        "icofont-cycling-alt"=>
        
        "cycling-alt",
        
        
        
        
        
        
        "icofont-cycling"=>
        
        "cycling",
        
        
        
        
        
        
        "icofont-dumbbell"=>
        
        "dumbbell",
        
        
        
        
        
        
        "icofont-dumbbells"=>
        
        "dumbbells",
        
        
        
        
        
        
        "icofont-gym-alt-1"=>
        
        "gym-alt-1",
        
        
        
        
        
        
        "icofont-gym-alt-2"=>
        
        "gym-alt-2",
        
        
        
        
        
        
        "icofont-gym-alt-3"=>
        
        "gym-alt-3",
        
        
        
        
        
        
        "icofont-gym"=>
        
        "gym",
        
        
        
        
        
        
        "icofont-muscle-weight"=>
        
        "muscle-weight",
        
        
        
        
        
        
        "icofont-muscle"=>
        
        "muscle",
        
        
        
        
        
        
        "icofont-apple"=>
        
        "apple",
        
        
        
        
        
        
        "icofont-arabian-coffee"=>
        
        "arabian-coffee",
        
        
        
        
        
        
        "icofont-artichoke"=>
        
        "artichoke",
        
        
        
        
        
        
        "icofont-asparagus"=>
        
        "asparagus",
        
        
        
        
        
        
        "icofont-avocado"=>
        
        "avocado",
        
        
        
        
        
        
        "icofont-baby-food"=>
        
        "baby-food",
        
        
        
        
        
        
        "icofont-banana"=>
        
        "banana",
        
        
        
        
        
        
        "icofont-bbq"=>
        
        "bbq",
        
        
        
        
        
        
        "icofont-beans"=>
        
        "beans",
        
        
        
        
        
        
        "icofont-beer"=>
        
        "beer",
        
        
        
        
        
        
        "icofont-bell-pepper-capsicum"=>
        
        "bell-pepper-capsicum",
        
        
        
        
        
        
        "icofont-birthday-cake"=>
        
        "birthday-cake",
        
        
        
        
        
        
        "icofont-bread"=>
        
        "bread",
        
        
        
        
        
        
        "icofont-broccoli"=>
        
        "broccoli",
        
        
        
        
        
        
        "icofont-burger"=>
        
        "burger",
        
        
        
        
        
        
        "icofont-cabbage"=>
        
        "cabbage",
        
        
        
        
        
        
        "icofont-carrot"=>
        
        "carrot",
        
        
        
        
        
        
        "icofont-cauli-flower"=>
        
        "cauli-flower",
        
        
        
        
        
        
        "icofont-cheese"=>
        
        "cheese",
        
        
        
        
        
        
        "icofont-chef"=>
        
        "chef",
        
        
        
        
        
        
        "icofont-cherry"=>
        
        "cherry",
        
        
        
        
        
        
        "icofont-chicken-fry"=>
        
        "chicken-fry",
        
        
        
        
        
        
        "icofont-chicken"=>
        
        "chicken",
        
        
        
        
        
        
        "icofont-cocktail"=>
        
        "cocktail",
        
        
        
        
        
        
        "icofont-coconut-water"=>
        
        "coconut-water",
        
        
        
        
        
        
        "icofont-coconut"=>
        
        "coconut",
        
        
        
        
        
        
        "icofont-coffee-alt"=>
        
        "coffee-alt",
        
        
        
        
        
        
        "icofont-coffee-cup"=>
        
        "coffee-cup",
        
        
        
        
        
        
        "icofont-coffee-mug"=>
        
        "coffee-mug",
        
        
        
        
        
        
        "icofont-coffee-pot"=>
        
        "coffee-pot",
        
        
        
        
        
        
        "icofont-cola"=>
        
        "cola",
        
        
        
        
        
        
        "icofont-corn"=>
        
        "corn",
        
        
        
        
        
        
        "icofont-croissant"=>
        
        "croissant",
        
        
        
        
        
        
        "icofont-crop-plant"=>
        
        "crop-plant",
        
        
        
        
        
        
        "icofont-cucumber"=>
        
        "cucumber",
        
        
        
        
        
        
        "icofont-culinary"=>
        
        "culinary",
        
        
        
        
        
        
        "icofont-cup-cake"=>
        
        "cup-cake",
        
        
        
        
        
        
        "icofont-dining-table"=>
        
        "dining-table",
        
        
        
        
        
        
        "icofont-donut"=>
        
        "donut",
        
        
        
        
        
        
        "icofont-egg-plant"=>
        
        "egg-plant",
        
        
        
        
        
        
        "icofont-egg-poached"=>
        
        "egg-poached",
        
        
        
        
        
        
        "icofont-farmer-alt"=>
        
        "farmer-alt",
        
        
        
        
        
        
        "icofont-farmer"=>
        
        "farmer",
        
        
        
        
        
        
        "icofont-fast-food"=>
        
        "fast-food",
        
        
        
        
        
        
        "icofont-food-basket"=>
        
        "food-basket",
        
        
        
        
        
        
        "icofont-food-cart"=>
        
        "food-cart",
        
        
        
        
        
        
        "icofont-fork-and-knife"=>
        
        "fork-and-knife",
        
        
        
        
        
        
        "icofont-french-fries"=>
        
        "french-fries",
        
        
        
        
        
        
        "icofont-fruits"=>
        
        "fruits",
        
        
        
        
        
        
        "icofont-grapes"=>
        
        "grapes",
        
        
        
        
        
        
        "icofont-honey"=>
        
        "honey",
        
        
        
        
        
        
        "icofont-hot-dog"=>
        
        "hot-dog",
        
        
        
        
        
        
        "icofont-ice-cream-alt"=>
        
        "ice-cream-alt",
        
        
        
        
        
        
        "icofont-ice-cream"=>
        
        "ice-cream",
        
        
        
        
        
        
        "icofont-juice"=>
        
        "juice",
        
        
        
        
        
        
        "icofont-ketchup"=>
        
        "ketchup",
        
        
        
        
        
        
        "icofont-kiwi"=>
        
        "kiwi",
        
        
        
        
        
        
        "icofont-layered-cake"=>
        
        "layered-cake",
        
        
        
        
        
        
        "icofont-lemon-alt"=>
        
        "lemon-alt",
        
        
        
        
        
        
        "icofont-lemon"=>
        
        "lemon",
        
        
        
        
        
        
        "icofont-lobster"=>
        
        "lobster",
        
        
        
        
        
        
        "icofont-mango"=>
        
        "mango",
        
        
        
        
        
        
        "icofont-milk"=>
        
        "milk",
        
        
        
        
        
        
        "icofont-mushroom"=>
        
        "mushroom",
        
        
        
        
        
        
        "icofont-noodles"=>
        
        "noodles",
        
        
        
        
        
        
        "icofont-onion"=>
        
        "onion",
        
        
        
        
        
        
        "icofont-orange"=>
        
        "orange",
        
        
        
        
        
        
        "icofont-pear"=>
        
        "pear",
        
        
        
        
        
        
        "icofont-peas"=>
        
        "peas",
        
        
        
        
        
        
        "icofont-pepper"=>
        
        "pepper",
        
        
        
        
        
        
        "icofont-pie-alt"=>
        
        "pie-alt",
        
        
        
        
        
        
        "icofont-pie"=>
        
        "pie",
        
        
        
        
        
        
        "icofont-pineapple"=>
        
        "pineapple",
        
        
        
        
        
        
        "icofont-pizza-slice"=>
        
        "pizza-slice",
        
        
        
        
        
        
        "icofont-pizza"=>
        
        "pizza",
        
        
        
        
        
        
        "icofont-plant"=>
        
        "plant",
        
        
        
        
        
        
        "icofont-popcorn"=>
        
        "popcorn",
        
        
        
        
        
        
        "icofont-potato"=>
        
        "potato",
        
        
        
        
        
        
        "icofont-pumpkin"=>
        
        "pumpkin",
        
        
        
        
        
        
        "icofont-raddish"=>
        
        "raddish",
        
        
        
        
        
        
        "icofont-restaurant-menu"=>
        
        "restaurant-menu",
        
        
        
        
        
        
        "icofont-restaurant"=>
        
        "restaurant",
        
        
        
        
        
        
        "icofont-salt-and-pepper"=>
        
        "salt-and-pepper",
        
        
        
        
        
        
        "icofont-sandwich"=>
        
        "sandwich",
        
        
        
        
        
        
        "icofont-sausage"=>
        
        "sausage",
        
        
        
        
        
        
        "icofont-soft-drinks"=>
        
        "soft-drinks",
        
        
        
        
        
        
        "icofont-soup-bowl"=>
        
        "soup-bowl",
        
        
        
        
        
        
        "icofont-spoon-and-fork"=>
        
        "spoon-and-fork",
        
        
        
        
        
        
        "icofont-steak"=>
        
        "steak",
        
        
        
        
        
        
        "icofont-strawberry"=>
        
        "strawberry",
        
        
        
        
        
        
        "icofont-sub-sandwich"=>
        
        "sub-sandwich",
        
        
        
        
        
        
        "icofont-sushi"=>
        
        "sushi",
        
        
        
        
        
        
        "icofont-taco"=>
        
        "taco",
        
        
        
        
        
        
        "icofont-tea-pot"=>
        
        "tea-pot",
        
        
        
        
        
        
        "icofont-tea"=>
        
        "tea",
        
        
        
        
        
        
        "icofont-tomato"=>
        
        "tomato",
        
        
        
        
        
        
        "icofont-watermelon"=>
        
        "watermelon",
        
        
        
        
        
        
        "icofont-wheat"=>
        
        "wheat",
        
        
        
        
        
        
        "icofont-baby-backpack"=>
        
        "baby-backpack",
        
        
        
        
        
        
        "icofont-baby-cloth"=>
        
        "baby-cloth",
        
        
        
        
        
        
        "icofont-baby-milk-bottle"=>
        
        "baby-milk-bottle",
        
        
        
        
        
        
        "icofont-baby-trolley"=>
        
        "baby-trolley",
        
        
        
        
        
        
        "icofont-baby"=>
        
        "baby",
        
        
        
        
        
        
        "icofont-candy"=>
        
        "candy",
        
        
        
        
        
        
        "icofont-holding-hands"=>
        
        "holding-hands",
        
        
        
        
        
        
        "icofont-infant-nipple"=>
        
        "infant-nipple",
        
        
        
        
        
        
        "icofont-kids-scooter"=>
        
        "kids-scooter",
        
        
        
        
        
        
        "icofont-safety-pin"=>
        
        "safety-pin",
        
        
        
        
        
        
        "icofont-teddy-bear"=>
        
        "teddy-bear",
        
        
        
        
        
        
        "icofont-toy-ball"=>
        
        "toy-ball",
        
        
        
        
        
        
        "icofont-toy-cat"=>
        
        "toy-cat",
        
        
        
        
        
        
        "icofont-toy-duck"=>
        
        "toy-duck",
        
        
        
        
        
        
        "icofont-toy-elephant"=>
        
        "toy-elephant",
        
        
        
        
        
        
        "icofont-toy-hand"=>
        
        "toy-hand",
        
        
        
        
        
        
        "icofont-toy-horse"=>
        
        "toy-horse",
        
        
        
        
        
        
        "icofont-toy-lattu"=>
        
        "toy-lattu",
        
        
        
        
        
        
        "icofont-toy-train"=>
        
        "toy-train",
        
        
        
        
        
        
        "icofont-burglar"=>
        
        "burglar",
        
        
        
        
        
        
        "icofont-cannon-firing"=>
        
        "cannon-firing",
        
        
        
        
        
        
        "icofont-cc-camera"=>
        
        "cc-camera",
        
        
        
        
        
        
        "icofont-cop-badge"=>
        
        "cop-badge",
        
        
        
        
        
        
        "icofont-cop"=>
        
        "cop",
        
        
        
        
        
        
        "icofont-court-hammer"=>
        
        "court-hammer",
        
        
        
        
        
        
        "icofont-court"=>
        
        "court",
        
        
        
        
        
        
        "icofont-finger-print"=>
        
        "finger-print",
        
        
        
        
        
        
        "icofont-gavel"=>
        
        "gavel",
        
        
        
        
        
        
        "icofont-handcuff-alt"=>
        
        "handcuff-alt",
        
        
        
        
        
        
        "icofont-handcuff"=>
        
        "handcuff",
        
        
        
        
        
        
        "icofont-investigation"=>
        
        "investigation",
        
        
        
        
        
        
        "icofont-investigator"=>
        
        "investigator",
        
        
        
        
        
        
        "icofont-jail"=>
        
        "jail",
        
        
        
        
        
        
        "icofont-judge"=>
        
        "judge",
        
        
        
        
        
        
        "icofont-law-alt-1"=>
        
        "law-alt-1",
        
        
        
        
        
        
        "icofont-law-alt-2"=>
        
        "law-alt-2",
        
        
        
        
        
        
        "icofont-law-alt-3"=>
        
        "law-alt-3",
        
        
        
        
        
        
        "icofont-law-book"=>
        
        "law-book",
        
        
        
        
        
        
        "icofont-law-document"=>
        
        "law-document",
        
        
        
        
        
        
        "icofont-law-order"=>
        
        "law-order",
        
        
        
        
        
        
        "icofont-law-protect"=>
        
        "law-protect",
        
        
        
        
        
        
        "icofont-law-scales"=>
        
        "law-scales",
        
        
        
        
        
        
        "icofont-law"=>
        
        "law",
        
        
        
        
        
        
        "icofont-lawyer-alt-1"=>
        
        "lawyer-alt-1",
        
        
        
        
        
        
        "icofont-lawyer-alt-2"=>
        
        "lawyer-alt-2",
        
        
        
        
        
        
        "icofont-lawyer"=>
        
        "lawyer",
        
        
        
        
        
        
        "icofont-legal"=>
        
        "legal",
        
        
        
        
        
        
        "icofont-pistol"=>
        
        "pistol",
        
        
        
        
        
        
        "icofont-police-badge"=>
        
        "police-badge",
        
        
        
        
        
        
        "icofont-police-cap"=>
        
        "police-cap",
        
        
        
        
        
        
        "icofont-police-car-alt-1"=>
        
        "police-car-alt-1",
        
        
        
        
        
        
        "icofont-police-car-alt-2"=>
        
        "police-car-alt-2",
        
        
        
        
        
        
        "icofont-police-car"=>
        
        "police-car",
        
        
        
        
        
        
        "icofont-police-hat"=>
        
        "police-hat",
        
        
        
        
        
        
        "icofont-police-van"=>
        
        "police-van",
        
        
        
        
        
        
        "icofont-police"=>
        
        "police",
        
        
        
        
        
        
        "icofont-thief-alt"=>
        
        "thief-alt",
        
        
        
        
        
        
        "icofont-thief"=>
        
        "thief",
        
        
        
        
        
        
        "icofont-abacus-alt"=>
        
        "abacus-alt",
        
        
        
        
        
        
        "icofont-abacus"=>
        
        "abacus",
        
        
        
        
        
        
        "icofont-angle-180"=>
        
        "angle-180",
        
        
        
        
        
        
        "icofont-angle-45"=>
        
        "angle-45",
        
        
        
        
        
        
        "icofont-angle-90"=>
        
        "angle-90",
        
        
        
        
        
        
        "icofont-angle"=>
        
        "angle",
        
        
        
        
        
        
        "icofont-calculator-alt-1"=>
        
        "calculator-alt-1",
        
        
        
        
        
        
        "icofont-calculator-alt-2"=>
        
        "calculator-alt-2",
        
        
        
        
        
        
        "icofont-calculator"=>
        
        "calculator",
        
        
        
        
        
        
        "icofont-circle-ruler-alt"=>
        
        "circle-ruler-alt",
        
        
        
        
        
        
        "icofont-circle-ruler"=>
        
        "circle-ruler",
        
        
        
        
        
        
        "icofont-compass-alt-1"=>
        
        "compass-alt-1",
        
        
        
        
        
        
        "icofont-compass-alt-2"=>
        
        "compass-alt-2",
        
        
        
        
        
        
        "icofont-compass-alt-3"=>
        
        "compass-alt-3",
        
        
        
        
        
        
        "icofont-compass-alt-4"=>
        
        "compass-alt-4",
        
        
        
        
        
        
        "icofont-golden-ratio"=>
        
        "golden-ratio",
        
        
        
        
        
        
        "icofont-marker-alt-1"=>
        
        "marker-alt-1",
        
        
        
        
        
        
        "icofont-marker-alt-2"=>
        
        "marker-alt-2",
        
        
        
        
        
        
        "icofont-marker-alt-3"=>
        
        "marker-alt-3",
        
        
        
        
        
        
        "icofont-marker"=>
        
        "marker",
        
        
        
        
        
        
        "icofont-math"=>
        
        "math",
        
        
        
        
        
        
        "icofont-mathematical-alt-1"=>
        
        "mathematical-alt-1",
        
        
        
        
        
        
        "icofont-mathematical-alt-2"=>
        
        "mathematical-alt-2",
        
        
        
        
        
        
        "icofont-mathematical"=>
        
        "mathematical",
        
        
        
        
        
        
        "icofont-pen-alt-1"=>
        
        "pen-alt-1",
        
        
        
        
        
        
        "icofont-pen-alt-2"=>
        
        "pen-alt-2",
        
        
        
        
        
        
        "icofont-pen-alt-3"=>
        
        "pen-alt-3",
        
        
        
        
        
        
        "icofont-pen-holder-alt-1"=>
        
        "pen-holder-alt-1",
        
        
        
        
        
        
        "icofont-pen-holder"=>
        
        "pen-holder",
        
        
        
        
        
        
        "icofont-pen"=>
        
        "pen",
        
        
        
        
        
        
        "icofont-pencil-alt-1"=>
        
        "pencil-alt-1",
        
        
        
        
        
        
        "icofont-pencil-alt-2"=>
        
        "pencil-alt-2",
        
        
        
        
        
        
        "icofont-pencil-alt-3"=>
        
        "pencil-alt-3",
        
        
        
        
        
        
        "icofont-pencil-alt-4"=>
        
        "pencil-alt-4",
        
        
        
        
        
        
        "icofont-pencil"=>
        
        "pencil",
        
        
        
        
        
        
        "icofont-ruler-alt-1"=>
        
        "ruler-alt-1",
        
        
        
        
        
        
        "icofont-ruler-alt-2"=>
        
        "ruler-alt-2",
        
        
        
        
        
        
        "icofont-ruler-compass-alt"=>
        
        "ruler-compass-alt",
        
        
        
        
        
        
        "icofont-ruler-compass"=>
        
        "ruler-compass",
        
        
        
        
        
        
        "icofont-ruler-pencil-alt-1"=>
        
        "ruler-pencil-alt-1",
        
        
        
        
        
        
        "icofont-ruler-pencil-alt-2"=>
        
        "ruler-pencil-alt-2",
        
        
        
        
        
        
        "icofont-ruler-pencil"=>
        
        "ruler-pencil",
        
        
        
        
        
        
        "icofont-ruler"=>
        
        "ruler",
        
        
        
        
        
        
        "icofont-rulers-alt"=>
        
        "rulers-alt",
        
        
        
        
        
        
        "icofont-rulers"=>
        
        "rulers",
        
        
        
        
        
        
        "icofont-square-root"=>
        
        "square-root",
        
        
        
        
        
        
        "icofont-ui-calculator"=>
        
        "ui-calculator",
        
        
        
        
        
        
        "icofont-aids"=>
        
        "aids",
        
        
        
        
        
        
        "icofont-ambulance-crescent"=>
        
        "ambulance-crescent",
        
        
        
        
        
        
        "icofont-ambulance-cross"=>
        
        "ambulance-cross",
        
        
        
        
        
        
        "icofont-ambulance"=>
        
        "ambulance",
        
        
        
        
        
        
        "icofont-autism"=>
        
        "autism",
        
        
        
        
        
        
        "icofont-bandage"=>
        
        "bandage",
        
        
        
        
        
        
        "icofont-blind"=>
        
        "blind",
        
        
        
        
        
        
        "icofont-blood-drop"=>
        
        "blood-drop",
        
        
        
        
        
        
        "icofont-blood-test"=>
        
        "blood-test",
        
        
        
        
        
        
        "icofont-blood"=>
        
        "blood",
        
        
        
        
        
        
        "icofont-brain-alt"=>
        
        "brain-alt",
        
        
        
        
        
        
        "icofont-brain"=>
        
        "brain",
        
        
        
        
        
        
        "icofont-capsule"=>
        
        "capsule",
        
        
        
        
        
        
        "icofont-crutch"=>
        
        "crutch",
        
        
        
        
        
        
        "icofont-disabled"=>
        
        "disabled",
        
        
        
        
        
        
        "icofont-dna-alt-1"=>
        
        "dna-alt-1",
        
        
        
        
        
        
        "icofont-dna-alt-2"=>
        
        "dna-alt-2",
        
        
        
        
        
        
        "icofont-dna"=>
        
        "dna",
        
        
        
        
        
        
        "icofont-doctor-alt"=>
        
        "doctor-alt",
        
        
        
        
        
        
        "icofont-doctor"=>
        
        "doctor",
        
        
        
        
        
        
        "icofont-drug-pack"=>
        
        "drug-pack",
        
        
        
        
        
        
        "icofont-drug"=>
        
        "drug",
        
        
        
        
        
        
        "icofont-first-aid-alt"=>
        
        "first-aid-alt",
        
        
        
        
        
        
        "icofont-first-aid"=>
        
        "first-aid",
        
        
        
        
        
        
        "icofont-heart-beat-alt"=>
        
        "heart-beat-alt",
        
        
        
        
        
        
        "icofont-heart-beat"=>
        
        "heart-beat",
        
        
        
        
        
        
        "icofont-heartbeat"=>
        
        "heartbeat",
        
        
        
        
        
        
        "icofont-herbal"=>
        
        "herbal",
        
        
        
        
        
        
        "icofont-hospital"=>
        
        "hospital",
        
        
        
        
        
        
        "icofont-icu"=>
        
        "icu",
        
        
        
        
        
        
        "icofont-injection-syringe"=>
        
        "injection-syringe",
        
        
        
        
        
        
        "icofont-laboratory"=>
        
        "laboratory",
        
        
        
        
        
        
        "icofont-medical-sign-alt"=>
        
        "medical-sign-alt",
        
        
        
        
        
        
        "icofont-medical-sign"=>
        
        "medical-sign",
        
        
        
        
        
        
        "icofont-nurse-alt"=>
        
        "nurse-alt",
        
        
        
        
        
        
        "icofont-nurse"=>
        
        "nurse",
        
        
        
        
        
        
        "icofont-nursing-home"=>
        
        "nursing-home",
        
        
        
        
        
        
        "icofont-operation-theater"=>
        
        "operation-theater",
        
        
        
        
        
        
        "icofont-paralysis-disability"=>
        
        "paralysis-disability",
        
        
        
        
        
        
        "icofont-patient-bed"=>
        
        "patient-bed",
        
        
        
        
        
        
        "icofont-patient-file"=>
        
        "patient-file",
        
        
        
        
        
        
        "icofont-pills"=>
        
        "pills",
        
        
        
        
        
        
        "icofont-prescription"=>
        
        "prescription",
        
        
        
        
        
        
        "icofont-pulse"=>
        
        "pulse",
        
        
        
        
        
        
        "icofont-stethoscope-alt"=>
        
        "stethoscope-alt",
        
        
        
        
        
        
        "icofont-stethoscope"=>
        
        "stethoscope",
        
        
        
        
        
        
        "icofont-stretcher"=>
        
        "stretcher",
        
        
        
        
        
        
        "icofont-surgeon-alt"=>
        
        "surgeon-alt",
        
        
        
        
        
        
        "icofont-surgeon"=>
        
        "surgeon",
        
        
        
        
        
        
        "icofont-tablets"=>
        
        "tablets",
        
        
        
        
        
        
        "icofont-test-bottle"=>
        
        "test-bottle",
        
        
        
        
        
        
        "icofont-test-tube"=>
        
        "test-tube",
        
        
        
        
        
        
        "icofont-thermometer-alt"=>
        
        "thermometer-alt",
        
        
        
        
        
        
        "icofont-thermometer"=>
        
        "thermometer",
        
        
        
        
        
        
        "icofont-tooth"=>
        
        "tooth",
        
        
        
        
        
        
        "icofont-xray"=>
        
        "xray",
        
        
        
        
        
        
        "icofont-ui-add"=>
        
        "ui-add",
        
        
        
        
        
        
        "icofont-ui-alarm"=>
        
        "ui-alarm",
        
        
        
        
        
        
        "icofont-ui-battery"=>
        
        "ui-battery",
        
        
        
        
        
        
        "icofont-ui-block"=>
        
        "ui-block",
        
        
        
        
        
        
        "icofont-ui-bluetooth"=>
        
        "ui-bluetooth",
        
        
        
        
        
        
        "icofont-ui-brightness"=>
        
        "ui-brightness",
        
        
        
        
        
        
        "icofont-ui-browser"=>
        
        "ui-browser",
        
        
        
        
        
        
        "icofont-ui-calendar"=>
        
        "ui-calendar",
        
        
        
        
        
        
        "icofont-ui-call"=>
        
        "ui-call",
        
        
        
        
        
        
        "icofont-ui-camera"=>
        
        "ui-camera",
        
        
        
        
        
        
        "icofont-ui-cart"=>
        
        "ui-cart",
        
        
        
        
        
        
        "icofont-ui-cell-phone"=>
        
        "ui-cell-phone",
        
        
        
        
        
        
        "icofont-ui-chat"=>
        
        "ui-chat",
        
        
        
        
        
        
        "icofont-ui-check"=>
        
        "ui-check",
        
        
        
        
        
        
        "icofont-ui-clip-board"=>
        
        "ui-clip-board",
        
        
        
        
        
        
        "icofont-ui-clip"=>
        
        "ui-clip",
        
        
        
        
        
        
        "icofont-ui-clock"=>
        
        "ui-clock",
        
        
        
        
        
        
        "icofont-ui-close"=>
        
        "ui-close",
        
        
        
        
        
        
        "icofont-ui-contact-list"=>
        
        "ui-contact-list",
        
        
        
        
        
        
        "icofont-ui-copy"=>
        
        "ui-copy",
        
        
        
        
        
        
        "icofont-ui-cut"=>
        
        "ui-cut",
        
        
        
        
        
        
        "icofont-ui-delete"=>
        
        "ui-delete",
        
        
        
        
        
        
        "icofont-ui-dial-phone"=>
        
        "ui-dial-phone",
        
        
        
        
        
        
        "icofont-ui-edit"=>
        
        "ui-edit",
        
        
        
        
        
        
        "icofont-ui-email"=>
        
        "ui-email",
        
        
        
        
        
        
        "icofont-ui-file"=>
        
        "ui-file",
        
        
        
        
        
        
        "icofont-ui-fire-wall"=>
        
        "ui-fire-wall",
        
        
        
        
        
        
        "icofont-ui-flash-light"=>
        
        "ui-flash-light",
        
        
        
        
        
        
        "icofont-ui-flight"=>
        
        "ui-flight",
        
        
        
        
        
        
        "icofont-ui-folder"=>
        
        "ui-folder",
        
        
        
        
        
        
        "icofont-ui-game"=>
        
        "ui-game",
        
        
        
        
        
        
        "icofont-ui-handicapped"=>
        
        "ui-handicapped",
        
        
        
        
        
        
        "icofont-ui-home"=>
        
        "ui-home",
        
        
        
        
        
        
        "icofont-ui-image"=>
        
        "ui-image",
        
        
        
        
        
        
        "icofont-ui-laoding"=>
        
        "ui-laoding",
        
        
        
        
        
        
        "icofont-ui-lock"=>
        
        "ui-lock",
        
        
        
        
        
        
        "icofont-ui-love-add"=>
        
        "ui-love-add",
        
        
        
        
        
        
        "icofont-ui-love-broken"=>
        
        "ui-love-broken",
        
        
        
        
        
        
        "icofont-ui-love-remove"=>
        
        "ui-love-remove",
        
        
        
        
        
        
        "icofont-ui-love"=>
        
        "ui-love",
        
        
        
        
        
        
        "icofont-ui-map"=>
        
        "ui-map",
        
        
        
        
        
        
        "icofont-ui-message"=>
        
        "ui-message",
        
        
        
        
        
        
        "icofont-ui-messaging"=>
        
        "ui-messaging",
        
        
        
        
        
        
        "icofont-ui-movie"=>
        
        "ui-movie",
        
        
        
        
        
        
        "icofont-ui-music-player"=>
        
        "ui-music-player",
        
        
        
        
        
        
        "icofont-ui-music"=>
        
        "ui-music",
        
        
        
        
        
        
        "icofont-ui-mute"=>
        
        "ui-mute",
        
        
        
        
        
        
        "icofont-ui-network"=>
        
        "ui-network",
        
        
        
        
        
        
        "icofont-ui-next"=>
        
        "ui-next",
        
        
        
        
        
        
        "icofont-ui-note"=>
        
        "ui-note",
        
        
        
        
        
        
        "icofont-ui-office"=>
        
        "ui-office",
        
        
        
        
        
        
        "icofont-ui-password"=>
        
        "ui-password",
        
        
        
        
        
        
        "icofont-ui-pause"=>
        
        "ui-pause",
        
        
        
        
        
        
        "icofont-ui-play-stop"=>
        
        "ui-play-stop",
        
        
        
        
        
        
        "icofont-ui-play"=>
        
        "ui-play",
        
        
        
        
        
        
        "icofont-ui-pointer"=>
        
        "ui-pointer",
        
        
        
        
        
        
        "icofont-ui-power"=>
        
        "ui-power",
        
        
        
        
        
        
        "icofont-ui-press"=>
        
        "ui-press",
        
        
        
        
        
        
        "icofont-ui-previous"=>
        
        "ui-previous",
        
        
        
        
        
        
        "icofont-ui-rate-add"=>
        
        "ui-rate-add",
        
        
        
        
        
        
        "icofont-ui-rate-blank"=>
        
        "ui-rate-blank",
        
        
        
        
        
        
        "icofont-ui-rate-remove"=>
        
        "ui-rate-remove",
        
        
        
        
        
        
        "icofont-ui-rating"=>
        
        "ui-rating",
        
        
        
        
        
        
        "icofont-ui-record"=>
        
        "ui-record",
        
        
        
        
        
        
        "icofont-ui-remove"=>
        
        "ui-remove",
        
        
        
        
        
        
        "icofont-ui-reply"=>
        
        "ui-reply",
        
        
        
        
        
        
        "icofont-ui-rotation"=>
        
        "ui-rotation",
        
        
        
        
        
        
        "icofont-ui-rss"=>
        
        "ui-rss",
        
        
        
        
        
        
        "icofont-ui-search"=>
        
        "ui-search",
        
        
        
        
        
        
        "icofont-ui-settings"=>
        
        "ui-settings",
        
        
        
        
        
        
        "icofont-ui-social-link"=>
        
        "ui-social-link",
        
        
        
        
        
        
        "icofont-ui-tag"=>
        
        "ui-tag",
        
        
        
        
        
        
        "icofont-ui-text-chat"=>
        
        "ui-text-chat",
        
        
        
        
        
        
        "icofont-ui-text-loading"=>
        
        "ui-text-loading",
        
        
        
        
        
        
        "icofont-ui-theme"=>
        
        "ui-theme",
        
        
        
        
        
        
        "icofont-ui-timer"=>
        
        "ui-timer",
        
        
        
        
        
        
        "icofont-ui-touch-phone"=>
        
        "ui-touch-phone",
        
        
        
        
        
        
        "icofont-ui-travel"=>
        
        "ui-travel",
        
        
        
        
        
        
        "icofont-ui-unlock"=>
        
        "ui-unlock",
        
        
        
        
        
        
        "icofont-ui-user-group"=>
        
        "ui-user-group",
        
        
        
        
        
        
        "icofont-ui-user"=>
        
        "ui-user",
        
        
        
        
        
        
        "icofont-ui-v-card"=>
        
        "ui-v-card",
        
        
        
        
        
        
        "icofont-ui-video-chat"=>
        
        "ui-video-chat",
        
        
        
        
        
        
        "icofont-ui-video-message"=>
        
        "ui-video-message",
        
        
        
        
        
        
        "icofont-ui-video-play"=>
        
        "ui-video-play",
        
        
        
        
        
        
        "icofont-ui-video"=>
        
        "ui-video",
        
        
        
        
        
        
        "icofont-ui-volume"=>
        
        "ui-volume",
        
        
        
        
        
        
        "icofont-ui-weather"=>
        
        "ui-weather",
        
        
        
        
        
        
        "icofont-ui-wifi"=>
        
        "ui-wifi",
        
        
        
        
        
        
        "icofont-ui-zoom-in"=>
        
        "ui-zoom-in",
        
        
        
        
        
        
        "icofont-ui-zoom-out"=>
        
        "ui-zoom-out",
        
        
        
        
        
        
        "icofont-cassette-player"=>
        
        "cassette-player",
        
        
        
        
        
        
        "icofont-cassette"=>
        
        "cassette",
        
        
        
        
        
        
        "icofont-forward"=>
        
        "forward",
        
        
        
        
        
        
        "icofont-guiter"=>
        
        "guiter",
        
        
        
        
        
        
        "icofont-movie"=>
        
        "movie",
        
        
        
        
        
        
        "icofont-multimedia"=>
        
        "multimedia",
        
        
        
        
        
        
        "icofont-music-alt"=>
        
        "music-alt",
        
        
        
        
        
        
        "icofont-music-disk"=>
        
        "music-disk",
        
        
        
        
        
        
        "icofont-music-note"=>
        
        "music-note",
        
        
        
        
        
        
        "icofont-music-notes"=>
        
        "music-notes",
        
        
        
        
        
        
        "icofont-music"=>
        
        "music",
        
        
        
        
        
        
        "icofont-mute-volume"=>
        
        "mute-volume",
        
        
        
        
        
        
        "icofont-pause"=>
        
        "pause",
        
        
        
        
        
        
        "icofont-play-alt-1"=>
        
        "play-alt-1",
        
        
        
        
        
        
        "icofont-play-alt-2"=>
        
        "play-alt-2",
        
        
        
        
        
        
        "icofont-play-alt-3"=>
        
        "play-alt-3",
        
        
        
        
        
        
        "icofont-play-pause"=>
        
        "play-pause",
        
        
        
        
        
        
        "icofont-play"=>
        
        "play",
        
        
        
        
        
        
        "icofont-record"=>
        
        "record",
        
        
        
        
        
        
        "icofont-retro-music-disk"=>
        
        "retro-music-disk",
        
        
        
        
        
        
        "icofont-rewind"=>
        
        "rewind",
        
        
        
        
        
        
        "icofont-song-notes"=>
        
        "song-notes",
        
        
        
        
        
        
        "icofont-sound-wave-alt"=>
        
        "sound-wave-alt",
        
        
        
        
        
        
        "icofont-sound-wave"=>
        
        "sound-wave",
        
        
        
        
        
        
        "icofont-stop"=>
        
        "stop",
        
        
        
        
        
        
        "icofont-video-alt"=>
        
        "video-alt",
        
        
        
        
        
        
        "icofont-video-cam"=>
        
        "video-cam",
        
        
        
        
        
        
        "icofont-video-clapper"=>
        
        "video-clapper",
        
        
        
        
        
        
        "icofont-video"=>
        
        "video",
        
        
        
        
        
        
        "icofont-volume-bar"=>
        
        "volume-bar",
        
        
        
        
        
        
        "icofont-volume-down"=>
        
        "volume-down",
        
        
        
        
        
        
        "icofont-volume-mute"=>
        
        "volume-mute",
        
        
        
        
        
        
        "icofont-volume-off"=>
        
        "volume-off",
        
        
        
        
        
        
        "icofont-volume-up"=>
        
        "volume-up",
        
        
        
        
        
        
        "icofont-youtube-play"=>
        
        "youtube-play",
        
        
        
        
        
        
        "icofont-2checkout-alt"=>
        
        "2checkout-alt",
        
        
        
        
        
        
        "icofont-2checkout"=>
        
        "2checkout",
        
        
        
        
        
        
        "icofont-amazon-alt"=>
        
        "amazon-alt",
        
        
        
        
        
        
        "icofont-amazon"=>
        
        "amazon",
        
        
        
        
        
        
        "icofont-american-express-alt"=>
        
        "american-express-alt",
        
        
        
        
        
        
        "icofont-american-express"=>
        
        "american-express",
        
        
        
        
        
        
        "icofont-apple-pay-alt"=>
        
        "apple-pay-alt",
        
        
        
        
        
        
        "icofont-apple-pay"=>
        
        "apple-pay",
        
        
        
        
        
        
        "icofont-bank-transfer-alt"=>
        
        "bank-transfer-alt",
        
        
        
        
        
        
        "icofont-bank-transfer"=>
        
        "bank-transfer",
        
        
        
        
        
        
        "icofont-braintree-alt"=>
        
        "braintree-alt",
        
        
        
        
        
        
        "icofont-braintree"=>
        
        "braintree",
        
        
        
        
        
        
        "icofont-cash-on-delivery-alt"=>
        
        "cash-on-delivery-alt",
        
        
        
        
        
        
        "icofont-cash-on-delivery"=>
        
        "cash-on-delivery",
        
        
        
        
        
        
        "icofont-diners-club-alt-1"=>
        
        "diners-club-alt-1",
        
        
        
        
        
        
        "icofont-diners-club-alt-2"=>
        
        "diners-club-alt-2",
        
        
        
        
        
        
        "icofont-diners-club-alt-3"=>
        
        "diners-club-alt-3",
        
        
        
        
        
        
        "icofont-diners-club"=>
        
        "diners-club",
        
        
        
        
        
        
        "icofont-discover-alt"=>
        
        "discover-alt",
        
        
        
        
        
        
        "icofont-discover"=>
        
        "discover",
        
        
        
        
        
        
        "icofont-eway-alt"=>
        
        "eway-alt",
        
        
        
        
        
        
        "icofont-eway"=>
        
        "eway",
        
        
        
        
        
        
        "icofont-google-wallet-alt-1"=>
        
        "google-wallet-alt-1",
        
        
        
        
        
        
        "icofont-google-wallet-alt-2"=>
        
        "google-wallet-alt-2",
        
        
        
        
        
        
        "icofont-google-wallet-alt-3"=>
        
        "google-wallet-alt-3",
        
        
        
        
        
        
        "icofont-google-wallet"=>
        
        "google-wallet",
        
        
        
        
        
        
        "icofont-jcb-alt"=>
        
        "jcb-alt",
        
        
        
        
        
        
        "icofont-jcb"=>
        
        "jcb",
        
        
        
        
        
        
        "icofont-maestro-alt"=>
        
        "maestro-alt",
        
        
        
        
        
        
        "icofont-maestro"=>
        
        "maestro",
        
        
        
        
        
        
        "icofont-mastercard-alt"=>
        
        "mastercard-alt",
        
        
        
        
        
        
        "icofont-mastercard"=>
        
        "mastercard",
        
        
        
        
        
        
        "icofont-payoneer-alt"=>
        
        "payoneer-alt",
        
        
        
        
        
        
        "icofont-payoneer"=>
        
        "payoneer",
        
        
        
        
        
        
        "icofont-paypal-alt"=>
        
        "paypal-alt",
        
        
        
        
        
        
        "icofont-paypal"=>
        
        "paypal",
        
        
        
        
        
        
        "icofont-sage-alt"=>
        
        "sage-alt",
        
        
        
        
        
        
        "icofont-sage"=>
        
        "sage",
        
        
        
        
        
        
        "icofont-skrill-alt"=>
        
        "skrill-alt",
        
        
        
        
        
        
        "icofont-skrill"=>
        
        "skrill",
        
        
        
        
        
        
        "icofont-stripe-alt"=>
        
        "stripe-alt",
        
        
        
        
        
        
        "icofont-stripe"=>
        
        "stripe",
        
        
        
        
        
        
        "icofont-visa-alt"=>
        
        "visa-alt",
        
        
        
        
        
        
        "icofont-visa-electron"=>
        
        "visa-electron",
        
        
        
        
        
        
        "icofont-visa"=>
        
        "visa",
        
        
        
        
        
        
        "icofont-western-union-alt"=>
        
        "western-union-alt",
        
        
        
        
        
        
        "icofont-western-union"=>
        
        "western-union",
        
        
        
        
        
        
        "icofont-boy"=>
        
        "boy",
        
        
        
        
        
        
        "icofont-business-man-alt-1"=>
        
        "business-man-alt-1",
        
        
        
        
        
        
        "icofont-business-man-alt-2"=>
        
        "business-man-alt-2",
        
        
        
        
        
        
        "icofont-business-man-alt-3"=>
        
        "business-man-alt-3",
        
        
        
        
        
        
        "icofont-business-man"=>
        
        "business-man",
        
        
        
        
        
        
        "icofont-female"=>
        
        "female",
        
        
        
        
        
        
        "icofont-funky-man"=>
        
        "funky-man",
        
        
        
        
        
        
        "icofont-girl-alt"=>
        
        "girl-alt",
        
        
        
        
        
        
        "icofont-girl"=>
        
        "girl",
        
        
        
        
        
        
        "icofont-group"=>
        
        "group",
        
        
        
        
        
        
        "icofont-hotel-boy-alt"=>
        
        "hotel-boy-alt",
        
        
        
        
        
        
        "icofont-hotel-boy"=>
        
        "hotel-boy",
        
        
        
        
        
        
        "icofont-kid"=>
        
        "kid",
        
        
        
        
        
        
        "icofont-man-in-glasses"=>
        
        "man-in-glasses",
        
        
        
        
        
        
        "icofont-people"=>
        
        "people",
        
        
        
        
        
        
        "icofont-support"=>
        
        "support",
        
        
        
        
        
        
        "icofont-user-alt-1"=>
        
        "user-alt-1",
        
        
        
        
        
        
        "icofont-user-alt-2"=>
        
        "user-alt-2",
        
        
        
        
        
        
        "icofont-user-alt-3"=>
        
        "user-alt-3",
        
        
        
        
        
        
        "icofont-user-alt-4"=>
        
        "user-alt-4",
        
        
        
        
        
        
        "icofont-user-alt-5"=>
        
        "user-alt-5",
        
        
        
        
        
        
        "icofont-user-alt-6"=>
        
        "user-alt-6",
        
        
        
        
        
        
        "icofont-user-alt-7"=>
        
        "user-alt-7",
        
        
        
        
        
        
        "icofont-user-female"=>
        
        "user-female",
        
        
        
        
        
        
        "icofont-user-male"=>
        
        "user-male",
        
        
        
        
        
        
        "icofont-user-suited"=>
        
        "user-suited",
        
        
        
        
        
        
        "icofont-user"=>
        
        "user",
        
        
        
        
        
        
        "icofont-users-alt-1"=>
        
        "users-alt-1",
        
        
        
        
        
        
        "icofont-users-alt-2"=>
        
        "users-alt-2",
        
        
        
        
        
        
        "icofont-users-alt-3"=>
        
        "users-alt-3",
        
        
        
        
        
        
        "icofont-users-alt-4"=>
        
        "users-alt-4",
        
        
        
        
        
        
        "icofont-users-alt-5"=>
        
        "users-alt-5",
        
        
        
        
        
        
        "icofont-users-alt-6"=>
        
        "users-alt-6",
        
        
        
        
        
        
        "icofont-users-social"=>
        
        "users-social",
        
        
        
        
        
        
        "icofont-users"=>
        
        "users",
        
        
        
        
        
        
        "icofont-waiter-alt"=>
        
        "waiter-alt",
        
        
        
        
        
        
        "icofont-waiter"=>
        
        "waiter",
        
        
        
        
        
        
        "icofont-woman-in-glasses"=>
        
        "woman-in-glasses",
        
        
        
        
        
        
        "icofont-search-1"=>
        
        "search-1",
        
        
        
        
        
        
        "icofont-search-2"=>
        
        "search-2",
        
        
        
        
        
        
        "icofont-search-document"=>
        
        "search-document",
        
        
        
        
        
        
        "icofont-search-folder"=>
        
        "search-folder",
        
        
        
        
        
        
        "icofont-search-job"=>
        
        "search-job",
        
        
        
        
        
        
        "icofont-search-map"=>
        
        "search-map",
        
        
        
        
        
        
        "icofont-search-property"=>
        
        "search-property",
        
        
        
        
        
        
        "icofont-search-restaurant"=>
        
        "search-restaurant",
        
        
        
        
        
        
        "icofont-search-stock"=>
        
        "search-stock",
        
        
        
        
        
        
        "icofont-search-user"=>
        
        "search-user",
        
        
        
        
        
        
        "icofont-search"=>
        
        "search",
        
        
        
        
        
        
        "icofont-500px"=>
        
        "500px",
        
        
        
        
        
        
        "icofont-aim"=>
        
        "aim",
        
        
        
        
        
        
        "icofont-badoo"=>
        
        "badoo",
        
        
        
        
        
        
        "icofont-baidu-tieba"=>
        
        "baidu-tieba",
        
        
        
        
        
        
        "icofont-bbm-messenger"=>
        
        "bbm-messenger",
        
        
        
        
        
        
        "icofont-bebo"=>
        
        "bebo",
        
        
        
        
        
        
        "icofont-behance"=>
        
        "behance",
        
        
        
        
        
        
        "icofont-blogger"=>
        
        "blogger",
        
        
        
        
        
        
        "icofont-bootstrap"=>
        
        "bootstrap",
        
        
        
        
        
        
        "icofont-brightkite"=>
        
        "brightkite",
        
        
        
        
        
        
        "icofont-cloudapp"=>
        
        "cloudapp",
        
        
        
        
        
        
        "icofont-concrete5"=>
        
        "concrete5",
        
        
        
        
        
        
        "icofont-delicious"=>
        
        "delicious",
        
        
        
        
        
        
        "icofont-designbump"=>
        
        "designbump",
        
        
        
        
        
        
        "icofont-designfloat"=>
        
        "designfloat",
        
        
        
        
        
        
        "icofont-deviantart"=>
        
        "deviantart",
        
        
        
        
        
        
        "icofont-digg"=>
        
        "digg",
        
        
        
        
        
        
        "icofont-dotcms"=>
        
        "dotcms",
        
        
        
        
        
        
        "icofont-dribbble"=>
        
        "dribbble",
        
        
        
        
        
        
        "icofont-dribble"=>
        
        "dribble",
        
        
        
        
        
        
        "icofont-dropbox"=>
        
        "dropbox",
        
        
        
        
        
        
        "icofont-ebuddy"=>
        
        "ebuddy",
        
        
        
        
        
        
        "icofont-ello"=>
        
        "ello",
        
        
        
        
        
        
        "icofont-ember"=>
        
        "ember",
        
        
        
        
        
        
        "icofont-envato"=>
        
        "envato",
        
        
        
        
        
        
        "icofont-evernote"=>
        
        "evernote",
        
        
        
        
        
        
        "icofont-facebook-messenger"=>
        
        "facebook-messenger",
        
        
        
        
        
        
        "icofont-facebook"=>
        
        "facebook",
        
        
        
        
        
        
        "icofont-feedburner"=>
        
        "feedburner",
        
        
        
        
        
        
        "icofont-flikr"=>
        
        "flikr",
        
        
        
        
        
        
        "icofont-folkd"=>
        
        "folkd",
        
        
        
        
        
        
        "icofont-foursquare"=>
        
        "foursquare",
        
        
        
        
        
        
        "icofont-friendfeed"=>
        
        "friendfeed",
        
        
        
        
        
        
        "icofont-ghost"=>
        
        "ghost",
        
        
        
        
        
        
        "icofont-github"=>
        
        "github",
        
        
        
        
        
        
        "icofont-gnome"=>
        
        "gnome",
        
        
        
        
        
        
        "icofont-google-buzz"=>
        
        "google-buzz",
        
        
        
        
        
        
        "icofont-google-hangouts"=>
        
        "google-hangouts",
        
        
        
        
        
        
        "icofont-google-map"=>
        
        "google-map",
        
        
        
        
        
        
        "icofont-google-plus"=>
        
        "google-plus",
        
        
        
        
        
        
        "icofont-google-talk"=>
        
        "google-talk",
        
        
        
        
        
        
        "icofont-hype-machine"=>
        
        "hype-machine",
        
        
        
        
        
        
        "icofont-instagram"=>
        
        "instagram",
        
        
        
        
        
        
        "icofont-kakaotalk"=>
        
        "kakaotalk",
        
        
        
        
        
        
        "icofont-kickstarter"=>
        
        "kickstarter",
        
        
        
        
        
        
        "icofont-kik"=>
        
        "kik",
        
        
        
        
        
        
        "icofont-kiwibox"=>
        
        "kiwibox",
        
        
        
        
        
        
        "icofont-line-messenger"=>
        
        "line-messenger",
        
        
        
        
        
        
        "icofont-line"=>
        
        "line",
        
        
        
        
        
        
        "icofont-linkedin"=>
        
        "linkedin",
        
        
        
        
        
        
        "icofont-linux-mint"=>
        
        "linux-mint",
        
        
        
        
        
        
        "icofont-live-messenger"=>
        
        "live-messenger",
        
        
        
        
        
        
        "icofont-livejournal"=>
        
        "livejournal",
        
        
        
        
        
        
        "icofont-magento"=>
        
        "magento",
        
        
        
        
        
        
        "icofont-meetme"=>
        
        "meetme",
        
        
        
        
        
        
        "icofont-meetup"=>
        
        "meetup",
        
        
        
        
        
        
        "icofont-mixx"=>
        
        "mixx",
        
        
        
        
        
        
        "icofont-newsvine"=>
        
        "newsvine",
        
        
        
        
        
        
        "icofont-nimbuss"=>
        
        "nimbuss",
        
        
        
        
        
        
        "icofont-odnoklassniki"=>
        
        "odnoklassniki",
        
        
        
        
        
        
        "icofont-opencart"=>
        
        "opencart",
        
        
        
        
        
        
        "icofont-oscommerce"=>
        
        "oscommerce",
        
        
        
        
        
        
        "icofont-pandora"=>
        
        "pandora",
        
        
        
        
        
        
        "icofont-photobucket"=>
        
        "photobucket",
        
        
        
        
        
        
        "icofont-picasa"=>
        
        "picasa",
        
        
        
        
        
        
        "icofont-pinterest"=>
        
        "pinterest",
        
        
        
        
        
        
        "icofont-prestashop"=>
        
        "prestashop",
        
        
        
        
        
        
        "icofont-qik"=>
        
        "qik",
        
        
        
        
        
        
        "icofont-qq"=>
        
        "qq",
        
        
        
        
        
        
        "icofont-readernaut"=>
        
        "readernaut",
        
        
        
        
        
        
        "icofont-reddit"=>
        
        "reddit",
        
        
        
        
        
        
        "icofont-renren"=>
        
        "renren",
        
        
        
        
        
        
        "icofont-rss"=>
        
        "rss",
        
        
        
        
        
        
        "icofont-shopify"=>
        
        "shopify",
        
        
        
        
        
        
        "icofont-silverstripe"=>
        
        "silverstripe",
        
        
        
        
        
        
        "icofont-skype"=>
        
        "skype",
        
        
        
        
        
        
        "icofont-slack"=>
        
        "slack",
        
        
        
        
        
        
        "icofont-slashdot"=>
        
        "slashdot",
        
        
        
        
        
        
        "icofont-slidshare"=>
        
        "slidshare",
        
        
        
        
        
        
        "icofont-smugmug"=>
        
        "smugmug",
        
        
        
        
        
        
        "icofont-snapchat"=>
        
        "snapchat",
        
        
        
        
        
        
        "icofont-soundcloud"=>
        
        "soundcloud",
        
        
        
        
        
        
        "icofont-spotify"=>
        
        "spotify",
        
        
        
        
        
        
        "icofont-stack-exchange"=>
        
        "stack-exchange",
        
        
        
        
        
        
        "icofont-stack-overflow"=>
        
        "stack-overflow",
        
        
        
        
        
        
        "icofont-steam"=>
        
        "steam",
        
        
        
        
        
        
        "icofont-stumbleupon"=>
        
        "stumbleupon",
        
        
        
        
        
        
        "icofont-tagged"=>
        
        "tagged",
        
        
        
        
        
        
        "icofont-technorati"=>
        
        "technorati",
        
        
        
        
        
        
        "icofont-telegram"=>
        
        "telegram",
        
        
        
        
        
        
        "icofont-tinder"=>
        
        "tinder",
        
        
        
        
        
        
        "icofont-trello"=>
        
        "trello",
        
        
        
        
        
        
        "icofont-tumblr"=>
        
        "tumblr",
        
        
        
        
        
        
        "icofont-twitch"=>
        
        "twitch",
        
        
        
        
        
        
        "icofont-twitter"=>
        
        "twitter",
        
        
        
        
        
        
        "icofont-typo3"=>
        
        "typo3",
        
        
        
        
        
        
        "icofont-ubercart"=>
        
        "ubercart",
        
        
        
        
        
        
        "icofont-viber"=>
        
        "viber",
        
        
        
        
        
        
        "icofont-viddler"=>
        
        "viddler",
        
        
        
        
        
        
        "icofont-vimeo"=>
        
        "vimeo",
        
        
        
        
        
        
        "icofont-vine"=>
        
        "vine",
        
        
        
        
        
        
        "icofont-virb"=>
        
        "virb",
        
        
        
        
        
        
        "icofont-virtuemart"=>
        
        "virtuemart",
        
        
        
        
        
        
        "icofont-vk"=>
        
        "vk",
        
        
        
        
        
        
        "icofont-wechat"=>
        
        "wechat",
        
        
        
        
        
        
        "icofont-weibo"=>
        
        "weibo",
        
        
        
        
        
        
        "icofont-whatsapp"=>
        
        "whatsapp",
        
        
        
        
        
        
        "icofont-xing"=>
        
        "xing",
        
        
        
        
        
        
        "icofont-yahoo"=>
        
        "yahoo",
        
        
        
        
        
        
        "icofont-yelp"=>
        
        "yelp",
        
        
        
        
        
        
        "icofont-youku"=>
        
        "youku",
        
        
        
        
        
        
        "icofont-youtube"=>
        
        "youtube",
        
        
        
        
        
        
        "icofont-zencart"=>
        
        "zencart",
        
        
        
        
        
        
        "icofont-badminton-birdie"=>
        
        "badminton-birdie",
        
        
        
        
        
        
        "icofont-baseball"=>
        
        "baseball",
        
        
        
        
        
        
        "icofont-baseballer"=>
        
        "baseballer",
        
        
        
        
        
        
        "icofont-basketball-hoop"=>
        
        "basketball-hoop",
        
        
        
        
        
        
        "icofont-basketball"=>
        
        "basketball",
        
        
        
        
        
        
        "icofont-billiard-ball"=>
        
        "billiard-ball",
        
        
        
        
        
        
        "icofont-boot-alt-1"=>
        
        "boot-alt-1",
        
        
        
        
        
        
        "icofont-boot-alt-2"=>
        
        "boot-alt-2",
        
        
        
        
        
        
        "icofont-boot"=>
        
        "boot",
        
        
        
        
        
        
        "icofont-bowling-alt"=>
        
        "bowling-alt",
        
        
        
        
        
        
        "icofont-bowling"=>
        
        "bowling",
        
        
        
        
        
        
        "icofont-canoe"=>
        
        "canoe",
        
        
        
        
        
        
        "icofont-cheer-leader"=>
        
        "cheer-leader",
        
        
        
        
        
        
        "icofont-climbing"=>
        
        "climbing",
        
        
        
        
        
        
        "icofont-corner"=>
        
        "corner",
        
        
        
        
        
        
        "icofont-field-alt"=>
        
        "field-alt",
        
        
        
        
        
        
        "icofont-field"=>
        
        "field",
        
        
        
        
        
        
        "icofont-football-alt"=>
        
        "football-alt",
        
        
        
        
        
        
        "icofont-football-american"=>
        
        "football-american",
        
        
        
        
        
        
        "icofont-football"=>
        
        "football",
        
        
        
        
        
        
        "icofont-foul"=>
        
        "foul",
        
        
        
        
        
        
        "icofont-goal-keeper"=>
        
        "goal-keeper",
        
        
        
        
        
        
        "icofont-goal"=>
        
        "goal",
        
        
        
        
        
        
        "icofont-golf-alt"=>
        
        "golf-alt",
        
        
        
        
        
        
        "icofont-golf-bag"=>
        
        "golf-bag",
        
        
        
        
        
        
        "icofont-golf-cart"=>
        
        "golf-cart",
        
        
        
        
        
        
        "icofont-golf-field"=>
        
        "golf-field",
        
        
        
        
        
        
        "icofont-golf"=>
        
        "golf",
        
        
        
        
        
        
        "icofont-golfer"=>
        
        "golfer",
        
        
        
        
        
        
        "icofont-helmet"=>
        
        "helmet",
        
        
        
        
        
        
        "icofont-hockey-alt"=>
        
        "hockey-alt",
        
        
        
        
        
        
        "icofont-hockey"=>
        
        "hockey",
        
        
        
        
        
        
        "icofont-ice-skate"=>
        
        "ice-skate",
        
        
        
        
        
        
        "icofont-jersey-alt"=>
        
        "jersey-alt",
        
        
        
        
        
        
        "icofont-jersey"=>
        
        "jersey",
        
        
        
        
        
        
        "icofont-jumping"=>
        
        "jumping",
        
        
        
        
        
        
        "icofont-kick"=>
        
        "kick",
        
        
        
        
        
        
        "icofont-leg"=>
        
        "leg",
        
        
        
        
        
        
        "icofont-match-review"=>
        
        "match-review",
        
        
        
        
        
        
        "icofont-medal-sport"=>
        
        "medal-sport",
        
        
        
        
        
        
        "icofont-offside"=>
        
        "offside",
        
        
        
        
        
        
        "icofont-olympic-logo"=>
        
        "olympic-logo",
        
        
        
        
        
        
        "icofont-olympic"=>
        
        "olympic",
        
        
        
        
        
        
        "icofont-padding"=>
        
        "padding",
        
        
        
        
        
        
        "icofont-penalty-card"=>
        
        "penalty-card",
        
        
        
        
        
        
        "icofont-racer"=>
        
        "racer",
        
        
        
        
        
        
        "icofont-racing-car"=>
        
        "racing-car",
        
        
        
        
        
        
        "icofont-racing-flag-alt"=>
        
        "racing-flag-alt",
        
        
        
        
        
        
        "icofont-racing-flag"=>
        
        "racing-flag",
        
        
        
        
        
        
        "icofont-racings-wheel"=>
        
        "racings-wheel",
        
        
        
        
        
        
        "icofont-referee"=>
        
        "referee",
        
        
        
        
        
        
        "icofont-refree-jersey"=>
        
        "refree-jersey",
        
        
        
        
        
        
        "icofont-result-sport"=>
        
        "result-sport",
        
        
        
        
        
        
        "icofont-rugby-ball"=>
        
        "rugby-ball",
        
        
        
        
        
        
        "icofont-rugby-player"=>
        
        "rugby-player",
        
        
        
        
        
        
        "icofont-rugby"=>
        
        "rugby",
        
        
        
        
        
        
        "icofont-runner-alt-1"=>
        
        "runner-alt-1",
        
        
        
        
        
        
        "icofont-runner-alt-2"=>
        
        "runner-alt-2",
        
        
        
        
        
        
        "icofont-runner"=>
        
        "runner",
        
        
        
        
        
        
        "icofont-score-board"=>
        
        "score-board",
        
        
        
        
        
        
        "icofont-skiing-man"=>
        
        "skiing-man",
        
        
        
        
        
        
        "icofont-skydiving-goggles"=>
        
        "skydiving-goggles",
        
        
        
        
        
        
        "icofont-snow-mobile"=>
        
        "snow-mobile",
        
        
        
        
        
        
        "icofont-steering"=>
        
        "steering",
        
        
        
        
        
        
        "icofont-stopwatch"=>
        
        "stopwatch",
        
        
        
        
        
        
        "icofont-substitute"=>
        
        "substitute",
        
        
        
        
        
        
        "icofont-swimmer"=>
        
        "swimmer",
        
        
        
        
        
        
        "icofont-table-tennis"=>
        
        "table-tennis",
        
        
        
        
        
        
        "icofont-team-alt"=>
        
        "team-alt",
        
        
        
        
        
        
        "icofont-team"=>
        
        "team",
        
        
        
        
        
        
        "icofont-tennis-player"=>
        
        "tennis-player",
        
        
        
        
        
        
        "icofont-tennis"=>
        
        "tennis",
        
        
        
        
        
        
        "icofont-tracking"=>
        
        "tracking",
        
        
        
        
        
        
        "icofont-trophy-alt"=>
        
        "trophy-alt",
        
        
        
        
        
        
        "icofont-trophy"=>
        
        "trophy",
        
        
        
        
        
        
        "icofont-volleyball-alt"=>
        
        "volleyball-alt",
        
        
        
        
        
        
        "icofont-volleyball-fire"=>
        
        "volleyball-fire",
        
        
        
        
        
        
        "icofont-volleyball"=>
        
        "volleyball",
        
        
        
        
        
        
        "icofont-water-bottle"=>
        
        "water-bottle",
        
        
        
        
        
        
        "icofont-whistle-alt"=>
        
        "whistle-alt",
        
        
        
        
        
        
        "icofont-whistle"=>
        
        "whistle",
        
        
        
        
        
        
        "icofont-win-trophy"=>
        
        "win-trophy",
        
        
        
        
        
        
        "icofont-align-center"=>
        
        "align-center",
        
        
        
        
        
        
        "icofont-align-left"=>
        
        "align-left",
        
        
        
        
        
        
        "icofont-align-right"=>
        
        "align-right",
        
        
        
        
        
        
        "icofont-all-caps"=>
        
        "all-caps",
        
        
        
        
        
        
        "icofont-bold"=>
        
        "bold",
        
        
        
        
        
        
        "icofont-brush"=>
        
        "brush",
        
        
        
        
        
        
        "icofont-clip-board"=>
        
        "clip-board",
        
        
        
        
        
        
        "icofont-code-alt"=>
        
        "code-alt",
        
        
        
        
        
        
        "icofont-color-bucket"=>
        
        "color-bucket",
        
        
        
        
        
        
        "icofont-color-picker"=>
        
        "color-picker",
        
        
        
        
        
        
        "icofont-copy-invert"=>
        
        "copy-invert",
        
        
        
        
        
        
        "icofont-copy"=>
        
        "copy",
        
        
        
        
        
        
        "icofont-cut"=>
        
        "cut",
        
        
        
        
        
        
        "icofont-delete-alt"=>
        
        "delete-alt",
        
        
        
        
        
        
        "icofont-edit-alt"=>
        
        "edit-alt",
        
        
        
        
        
        
        "icofont-eraser-alt"=>
        
        "eraser-alt",
        
        
        
        
        
        
        "icofont-font"=>
        
        "font",
        
        
        
        
        
        
        "icofont-heading"=>
        
        "heading",
        
        
        
        
        
        
        "icofont-indent"=>
        
        "indent",
        
        
        
        
        
        
        "icofont-italic-alt"=>
        
        "italic-alt",
        
        
        
        
        
        
        "icofont-italic"=>
        
        "italic",
        
        
        
        
        
        
        "icofont-justify-all"=>
        
        "justify-all",
        
        
        
        
        
        
        "icofont-justify-center"=>
        
        "justify-center",
        
        
        
        
        
        
        "icofont-justify-left"=>
        
        "justify-left",
        
        
        
        
        
        
        "icofont-justify-right"=>
        
        "justify-right",
        
        
        
        
        
        
        "icofont-link-broken"=>
        
        "link-broken",
        
        
        
        
        
        
        "icofont-outdent"=>
        
        "outdent",
        
        
        
        
        
        
        "icofont-paper-clip"=>
        
        "paper-clip",
        
        
        
        
        
        
        "icofont-paragraph"=>
        
        "paragraph",
        
        
        
        
        
        
        "icofont-pin"=>
        
        "pin",
        
        
        
        
        
        
        "icofont-printer"=>
        
        "printer",
        
        
        
        
        
        
        "icofont-redo"=>
        
        "redo",
        
        
        
        
        
        
        "icofont-rotation"=>
        
        "rotation",
        
        
        
        
        
        
        "icofont-save"=>
        
        "save",
        
        
        
        
        
        
        "icofont-small-cap"=>
        
        "small-cap",
        
        
        
        
        
        
        "icofont-strike-through"=>
        
        "strike-through",
        
        
        
        
        
        
        "icofont-sub-listing"=>
        
        "sub-listing",
        
        
        
        
        
        
        "icofont-subscript"=>
        
        "subscript",
        
        
        
        
        
        
        "icofont-superscript"=>
        
        "superscript",
        
        
        
        
        
        
        "icofont-table"=>
        
        "table",
        
        
        
        
        
        
        "icofont-text-height"=>
        
        "text-height",
        
        
        
        
        
        
        "icofont-text-width"=>
        
        "text-width",
        
        
        
        
        
        
        "icofont-trash"=>
        
        "trash",
        
        
        
        
        
        
        "icofont-underline"=>
        
        "underline",
        
        
        
        
        
        
        "icofont-undo"=>
        
        "undo",
        
        
        
        
        
        
        "icofont-air-balloon"=>
        
        "air-balloon",
        
        
        
        
        
        
        "icofont-airplane-alt"=>
        
        "airplane-alt",
        
        
        
        
        
        
        "icofont-airplane"=>
        
        "airplane",
        
        
        
        
        
        
        "icofont-articulated-truck"=>
        
        "articulated-truck",
        
        
        
        
        
        
        "icofont-auto-mobile"=>
        
        "auto-mobile",
        
        
        
        
        
        
        "icofont-auto-rickshaw"=>
        
        "auto-rickshaw",
        
        
        
        
        
        
        "icofont-bicycle-alt-1"=>
        
        "bicycle-alt-1",
        
        
        
        
        
        
        "icofont-bicycle-alt-2"=>
        
        "bicycle-alt-2",
        
        
        
        
        
        
        "icofont-bicycle"=>
        
        "bicycle",
        
        
        
        
        
        
        "icofont-bus-alt-1"=>
        
        "bus-alt-1",
        
        
        
        
        
        
        "icofont-bus-alt-2"=>
        
        "bus-alt-2",
        
        
        
        
        
        
        "icofont-bus-alt-3"=>
        
        "bus-alt-3",
        
        
        
        
        
        
        "icofont-bus"=>
        
        "bus",
        
        
        
        
        
        
        "icofont-cab"=>
        
        "cab",
        
        
        
        
        
        
        "icofont-cable-car"=>
        
        "cable-car",
        
        
        
        
        
        
        "icofont-car-alt-1"=>
        
        "car-alt-1",
        
        
        
        
        
        
        "icofont-car-alt-2"=>
        
        "car-alt-2",
        
        
        
        
        
        
        "icofont-car-alt-3"=>
        
        "car-alt-3",
        
        
        
        
        
        
        "icofont-car-alt-4"=>
        
        "car-alt-4",
        
        
        
        
        
        
        "icofont-car"=>
        
        "car",
        
        
        
        
        
        
        "icofont-delivery-time"=>
        
        "delivery-time",
        
        
        
        
        
        
        "icofont-fast-delivery"=>
        
        "fast-delivery",
        
        
        
        
        
        
        "icofont-fire-truck-alt"=>
        
        "fire-truck-alt",
        
        
        
        
        
        
        "icofont-fire-truck"=>
        
        "fire-truck",
        
        
        
        
        
        
        "icofont-free-delivery"=>
        
        "free-delivery",
        
        
        
        
        
        
        "icofont-helicopter"=>
        
        "helicopter",
        
        
        
        
        
        
        "icofont-motor-bike-alt"=>
        
        "motor-bike-alt",
        
        
        
        
        
        
        "icofont-motor-bike"=>
        
        "motor-bike",
        
        
        
        
        
        
        "icofont-motor-biker"=>
        
        "motor-biker",
        
        
        
        
        
        
        "icofont-oil-truck"=>
        
        "oil-truck",
        
        
        
        
        
        
        "icofont-rickshaw"=>
        
        "rickshaw",
        
        
        
        
        
        
        "icofont-rocket-alt-1"=>
        
        "rocket-alt-1",
        
        
        
        
        
        
        "icofont-rocket-alt-2"=>
        
        "rocket-alt-2",
        
        
        
        
        
        
        "icofont-rocket"=>
        
        "rocket",
        
        
        
        
        
        
        "icofont-sail-boat-alt-1"=>
        
        "sail-boat-alt-1",
        
        
        
        
        
        
        "icofont-sail-boat-alt-2"=>
        
        "sail-boat-alt-2",
        
        
        
        
        
        
        "icofont-sail-boat"=>
        
        "sail-boat",
        
        
        
        
        
        
        "icofont-scooter"=>
        
        "scooter",
        
        
        
        
        
        
        "icofont-sea-plane"=>
        
        "sea-plane",
        
        
        
        
        
        
        "icofont-ship-alt"=>
        
        "ship-alt",
        
        
        
        
        
        
        "icofont-ship"=>
        
        "ship",
        
        
        
        
        
        
        "icofont-speed-boat"=>
        
        "speed-boat",
        
        
        
        
        
        
        "icofont-taxi"=>
        
        "taxi",
        
        
        
        
        
        
        "icofont-tractor"=>
        
        "tractor",
        
        
        
        
        
        
        "icofont-train-line"=>
        
        "train-line",
        
        
        
        
        
        
        "icofont-train-steam"=>
        
        "train-steam",
        
        
        
        
        
        
        "icofont-tram"=>
        
        "tram",
        
        
        
        
        
        
        "icofont-truck-alt"=>
        
        "truck-alt",
        
        
        
        
        
        
        "icofont-truck-loaded"=>
        
        "truck-loaded",
        
        
        
        
        
        
        "icofont-truck"=>
        
        "truck",
        
        
        
        
        
        
        "icofont-van-alt"=>
        
        "van-alt",
        
        
        
        
        
        
        "icofont-van"=>
        
        "van",
        
        
        
        
        
        
        "icofont-yacht"=>
        
        "yacht",
        
        
        
        
        
        
        "icofont-5-star-hotel"=>
        
        "5-star-hotel",
        
        
        
        
        
        
        "icofont-air-ticket"=>
        
        "air-ticket",
        
        
        
        
        
        
        "icofont-beach-bed"=>
        
        "beach-bed",
        
        
        
        
        
        
        "icofont-beach"=>
        
        "beach",
        
        
        
        
        
        
        "icofont-camping-vest"=>
        
        "camping-vest",
        
        
        
        
        
        
        "icofont-direction-sign"=>
        
        "direction-sign",
        
        
        
        
        
        
        "icofont-hill-side"=>
        
        "hill-side",
        
        
        
        
        
        
        "icofont-hill"=>
        
        "hill",
        
        
        
        
        
        
        "icofont-hotel"=>
        
        "hotel",
        
        
        
        
        
        
        "icofont-island-alt"=>
        
        "island-alt",
        
        
        
        
        
        
        "icofont-island"=>
        
        "island",
        
        
        
        
        
        
        "icofont-sandals-female"=>
        
        "sandals-female",
        
        
        
        
        
        
        "icofont-sandals-male"=>
        
        "sandals-male",
        
        
        
        
        
        
        "icofont-travelling"=>
        
        "travelling",
        
        
        
        
        
        
        "icofont-breakdown"=>
        
        "breakdown",
        
        
        
        
        
        
        "icofont-celsius"=>
        
        "celsius",
        
        
        
        
        
        
        "icofont-clouds"=>
        
        "clouds",
        
        
        
        
        
        
        "icofont-cloudy"=>
        
        "cloudy",
        
        
        
        
        
        
        "icofont-dust"=>
        
        "dust",
        
        
        
        
        
        
        "icofont-eclipse"=>
        
        "eclipse",
        
        
        
        
        
        
        "icofont-fahrenheit"=>
        
        "fahrenheit",
        
        
        
        
        
        
        "icofont-forest-fire"=>
        
        "forest-fire",
        
        
        
        
        
        
        "icofont-full-night"=>
        
        "full-night",
        
        
        
        
        
        
        "icofont-full-sunny"=>
        
        "full-sunny",
        
        
        
        
        
        
        "icofont-hail-night"=>
        
        "hail-night",
        
        
        
        
        
        
        "icofont-hail-rainy-night"=>
        
        "hail-rainy-night",
        
        
        
        
        
        
        "icofont-hail-rainy-sunny"=>
        
        "hail-rainy-sunny",
        
        
        
        
        
        
        "icofont-hail-rainy"=>
        
        "hail-rainy",
        
        
        
        
        
        
        "icofont-hail-sunny"=>
        
        "hail-sunny",
        
        
        
        
        
        
        "icofont-hail-thunder-night"=>
        
        "hail-thunder-night",
        
        
        
        
        
        
        "icofont-hail-thunder-sunny"=>
        
        "hail-thunder-sunny",
        
        
        
        
        
        
        "icofont-hail-thunder"=>
        
        "hail-thunder",
        
        
        
        
        
        
        "icofont-hail"=>
        
        "hail",
        
        
        
        
        
        
        "icofont-hill-night"=>
        
        "hill-night",
        
        
        
        
        
        
        "icofont-hill-sunny"=>
        
        "hill-sunny",
        
        
        
        
        
        
        "icofont-hurricane"=>
        
        "hurricane",
        
        
        
        
        
        
        "icofont-meteor"=>
        
        "meteor",
        
        
        
        
        
        
        "icofont-night"=>
        
        "night",
        
        
        
        
        
        
        "icofont-rainy-night"=>
        
        "rainy-night",
        
        
        
        
        
        
        "icofont-rainy-sunny"=>
        
        "rainy-sunny",
        
        
        
        
        
        
        "icofont-rainy-thunder"=>
        
        "rainy-thunder",
        
        
        
        
        
        
        "icofont-rainy"=>
        
        "rainy",
        
        
        
        
        
        
        "icofont-snow-alt"=>
        
        "snow-alt",
        
        
        
        
        
        
        "icofont-snow-flake"=>
        
        "snow-flake",
        
        
        
        
        
        
        "icofont-snow-temp"=>
        
        "snow-temp",
        
        
        
        
        
        
        "icofont-snow"=>
        
        "snow",
        
        
        
        
        
        
        "icofont-snowy-hail"=>
        
        "snowy-hail",
        
        
        
        
        
        
        "icofont-snowy-night-hail"=>
        
        "snowy-night-hail",
        
        
        
        
        
        
        "icofont-snowy-night-rainy"=>
        
        "snowy-night-rainy",
        
        
        
        
        
        
        "icofont-snowy-night"=>
        
        "snowy-night",
        
        
        
        
        
        
        "icofont-snowy-rainy"=>
        
        "snowy-rainy",
        
        
        
        
        
        
        "icofont-snowy-sunny-hail"=>
        
        "snowy-sunny-hail",
        
        
        
        
        
        
        "icofont-snowy-sunny-rainy"=>
        
        "snowy-sunny-rainy",
        
        
        
        
        
        
        "icofont-snowy-sunny"=>
        
        "snowy-sunny",
        
        
        
        
        
        
        "icofont-snowy-thunder-night"=>
        
        "snowy-thunder-night",
        
        
        
        
        
        
        "icofont-snowy-thunder-sunny"=>
        
        "snowy-thunder-sunny",
        
        
        
        
        
        
        "icofont-snowy-thunder"=>
        
        "snowy-thunder",
        
        
        
        
        
        
        "icofont-snowy-windy-night"=>
        
        "snowy-windy-night",
        
        
        
        
        
        
        "icofont-snowy-windy-sunny"=>
        
        "snowy-windy-sunny",
        
        
        
        
        
        
        "icofont-snowy-windy"=>
        
        "snowy-windy",
        
        
        
        
        
        
        "icofont-snowy"=>
        
        "snowy",
        
        
        
        
        
        
        "icofont-sun-alt"=>
        
        "sun-alt",
        
        
        
        
        
        
        "icofont-sun-rise"=>
        
        "sun-rise",
        
        
        
        
        
        
        "icofont-sun-set"=>
        
        "sun-set",
        
        
        
        
        
        
        "icofont-sun"=>
        
        "sun",
        
        
        
        
        
        
        "icofont-sunny-day-temp"=>
        
        "sunny-day-temp",
        
        
        
        
        
        
        "icofont-sunny"=>
        
        "sunny",
        
        
        
        
        
        
        "icofont-thunder-light"=>
        
        "thunder-light",
        
        
        
        
        
        
        "icofont-tornado"=>
        
        "tornado",
        
        
        
        
        
        
        "icofont-umbrella-alt"=>
        
        "umbrella-alt",
        
        
        
        
        
        
        "icofont-umbrella"=>
        
        "umbrella",
        
        
        
        
        
        
        "icofont-volcano"=>
        
        "volcano",
        
        
        
        
        
        
        "icofont-wave"=>
        
        "wave",
        
        
        
        
        
        
        "icofont-wind-scale-0"=>
        
        "wind-scale-0",
        
        
        
        
        
        
        "icofont-wind-scale-1"=>
        
        "wind-scale-1",
        
        
        
        
        
        
        "icofont-wind-scale-10"=>
        
        "wind-scale-10",
        
        
        
        
        
        
        "icofont-wind-scale-11"=>
        
        "wind-scale-11",
        
        
        
        
        
        
        "icofont-wind-scale-12"=>
        
        "wind-scale-12",
        
        
        
        
        
        
        "icofont-wind-scale-2"=>
        
        "wind-scale-2",
        
        
        
        
        
        
        "icofont-wind-scale-3"=>
        
        "wind-scale-3",
        
        
        
        
        
        
        "icofont-wind-scale-4"=>
        
        "wind-scale-4",
        
        
        
        
        
        
        "icofont-wind-scale-5"=>
        
        "wind-scale-5",
        
        
        
        
        
        
        "icofont-wind-scale-6"=>
        
        "wind-scale-6",
        
        
        
        
        
        
        "icofont-wind-scale-7"=>
        
        "wind-scale-7",
        
        
        
        
        
        
        "icofont-wind-scale-8"=>
        
        "wind-scale-8",
        
        
        
        
        
        
        "icofont-wind-scale-9"=>
        
        "wind-scale-9",
        
        
        
        
        
        
        "icofont-wind-waves"=>
        
        "wind-waves",
        
        
        
        
        
        
        "icofont-wind"=>
        
        "wind",
        
        
        
        
        
        
        "icofont-windy-hail"=>
        
        "windy-hail",
        
        
        
        
        
        
        "icofont-windy-night"=>
        
        "windy-night",
        
        
        
        
        
        
        "icofont-windy-raining"=>
        
        "windy-raining",
        
        
        
        
        
        
        "icofont-windy-sunny"=>
        
        "windy-sunny",
        
        
        
        
        
        
        "icofont-windy-thunder-raining"=>
        
        "windy-thunder-raining",
        
        
        
        
        
        
        "icofont-windy-thunder"=>
        
        "windy-thunder",
        
        
        
        
        
        
        "icofont-windy"=>
        
        "windy",
        
        
        
        
        
        
        "icofont-addons"=>
        
        "addons",
        
        
        
        
        
        
        "icofont-address-book"=>
        
        "address-book",
        
        
        
        
        
        
        "icofont-adjust"=>
        
        "adjust",
        
        
        
        
        
        
        "icofont-alarm"=>
        
        "alarm",
        
        
        
        
        
        
        "icofont-anchor"=>
        
        "anchor",
        
        
        
        
        
        
        "icofont-archive"=>
        
        "archive",
        
        
        
        
        
        
        "icofont-at"=>
        
        "at",
        
        
        
        
        
        
        "icofont-attachment"=>
        
        "attachment",
        
        
        
        
        
        
        "icofont-audio"=>
        
        "audio",
        
        
        
        
        
        
        "icofont-automation"=>
        
        "automation",
        
        
        
        
        
        
        "icofont-badge"=>
        
        "badge",
        
        
        
        
        
        
        "icofont-bag-alt"=>
        
        "bag-alt",
        
        
        
        
        
        
        "icofont-bag"=>
        
        "bag",
        
        
        
        
        
        
        "icofont-ban"=>
        
        "ban",
        
        
        
        
        
        
        "icofont-bar-code"=>
        
        "bar-code",
        
        
        
        
        
        
        "icofont-bars"=>
        
        "bars",
        
        
        
        
        
        
        "icofont-basket"=>
        
        "basket",
        
        
        
        
        
        
        "icofont-battery-empty"=>
        
        "battery-empty",
        
        
        
        
        
        
        "icofont-battery-full"=>
        
        "battery-full",
        
        
        
        
        
        
        "icofont-battery-half"=>
        
        "battery-half",
        
        
        
        
        
        
        "icofont-battery-low"=>
        
        "battery-low",
        
        
        
        
        
        
        "icofont-beaker"=>
        
        "beaker",
        
        
        
        
        
        
        "icofont-beard"=>
        
        "beard",
        
        
        
        
        
        
        "icofont-bed"=>
        
        "bed",
        
        
        
        
        
        
        "icofont-bell"=>
        
        "bell",
        
        
        
        
        
        
        "icofont-beverage"=>
        
        "beverage",
        
        
        
        
        
        
        "icofont-bill"=>
        
        "bill",
        
        
        
        
        
        
        "icofont-bin"=>
        
        "bin",
        
        
        
        
        
        
        "icofont-binary"=>
        
        "binary",
        
        
        
        
        
        
        "icofont-binoculars"=>
        
        "binoculars",
        
        
        
        
        
        
        "icofont-bluetooth"=>
        
        "bluetooth",
        
        
        
        
        
        
        "icofont-bomb"=>
        
        "bomb",
        
        
        
        
        
        
        "icofont-book-mark"=>
        
        "book-mark",
        
        
        
        
        
        
        "icofont-box"=>
        
        "box",
        
        
        
        
        
        
        "icofont-briefcase"=>
        
        "briefcase",
        
        
        
        
        
        
        "icofont-broken"=>
        
        "broken",
        
        
        
        
        
        
        "icofont-bucket"=>
        
        "bucket",
        
        
        
        
        
        
        "icofont-bucket1"=>
        
        "bucket1",
        
        
        
        
        
        
        "icofont-bucket2"=>
        
        "bucket2",
        
        
        
        
        
        
        "icofont-bug"=>
        
        "bug",
        
        
        
        
        
        
        "icofont-building"=>
        
        "building",
        
        
        
        
        
        
        "icofont-bulb-alt"=>
        
        "bulb-alt",
        
        
        
        
        
        
        "icofont-bullet"=>
        
        "bullet",
        
        
        
        
        
        
        "icofont-bullhorn"=>
        
        "bullhorn",
        
        
        
        
        
        
        "icofont-bullseye"=>
        
        "bullseye",
        
        
        
        
        
        
        "icofont-calendar"=>
        
        "calendar",
        
        
        
        
        
        
        "icofont-camera-alt"=>
        
        "camera-alt",
        
        
        
        
        
        
        "icofont-camera"=>
        
        "camera",
        
        
        
        
        
        
        "icofont-card"=>
        
        "card",
        
        
        
        
        
        
        "icofont-cart-alt"=>
        
        "cart-alt",
        
        
        
        
        
        
        "icofont-cart"=>
        
        "cart",
        
        
        
        
        
        
        "icofont-cc"=>
        
        "cc",
        
        
        
        
        
        
        "icofont-charging"=>
        
        "charging",
        
        
        
        
        
        
        "icofont-chat"=>
        
        "chat",
        
        
        
        
        
        
        "icofont-check-alt"=>
        
        "check-alt",
        
        
        
        
        
        
        "icofont-check-circled"=>
        
        "check-circled",
        
        
        
        
        
        
        "icofont-check"=>
        
        "check",
        
        
        
        
        
        
        "icofont-checked"=>
        
        "checked",
        
        
        
        
        
        
        "icofont-children-care"=>
        
        "children-care",
        
        
        
        
        
        
        "icofont-clip"=>
        
        "clip",
        
        
        
        
        
        
        "icofont-clock-time"=>
        
        "clock-time",
        
        
        
        
        
        
        "icofont-close-circled"=>
        
        "close-circled",
        
        
        
        
        
        
        "icofont-close-line-circled"=>
        
        "close-line-circled",
        
        
        
        
        
        
        "icofont-close-line-squared-alt"=>
        
        "close-line-squared-alt",
        
        
        
        
        
        
        "icofont-close-line-squared"=>
        
        "close-line-squared",
        
        
        
        
        
        
        "icofont-close-line"=>
        
        "close-line",
        
        
        
        
        
        
        "icofont-close-squared-alt"=>
        
        "close-squared-alt",
        
        
        
        
        
        
        "icofont-close-squared"=>
        
        "close-squared",
        
        
        
        
        
        
        "icofont-close"=>
        
        "close",
        
        
        
        
        
        
        "icofont-cloud-download"=>
        
        "cloud-download",
        
        
        
        
        
        
        "icofont-cloud-refresh"=>
        
        "cloud-refresh",
        
        
        
        
        
        
        "icofont-cloud-upload"=>
        
        "cloud-upload",
        
        
        
        
        
        
        "icofont-cloud"=>
        
        "cloud",
        
        
        
        
        
        
        "icofont-code-not-allowed"=>
        
        "code-not-allowed",
        
        
        
        
        
        
        "icofont-code"=>
        
        "code",
        
        
        
        
        
        
        "icofont-comment"=>
        
        "comment",
        
        
        
        
        
        
        "icofont-compass-alt"=>
        
        "compass-alt",
        
        
        
        
        
        
        "icofont-compass"=>
        
        "compass",
        
        
        
        
        
        
        "icofont-computer"=>
        
        "computer",
        
        
        
        
        
        
        "icofont-connection"=>
        
        "connection",
        
        
        
        
        
        
        "icofont-console"=>
        
        "console",
        
        
        
        
        
        
        "icofont-contacts"=>
        
        "contacts",
        
        
        
        
        
        
        "icofont-contrast"=>
        
        "contrast",
        
        
        
        
        
        
        "icofont-copyright"=>
        
        "copyright",
        
        
        
        
        
        
        "icofont-credit-card"=>
        
        "credit-card",
        
        
        
        
        
        
        "icofont-crop"=>
        
        "crop",
        
        
        
        
        
        
        "icofont-crown"=>
        
        "crown",
        
        
        
        
        
        
        "icofont-cube"=>
        
        "cube",
        
        
        
        
        
        
        "icofont-cubes"=>
        
        "cubes",
        
        
        
        
        
        
        "icofont-dashboard-web"=>
        
        "dashboard-web",
        
        
        
        
        
        
        "icofont-dashboard"=>
        
        "dashboard",
        
        
        
        
        
        
        "icofont-data"=>
        
        "data",
        
        
        
        
        
        
        "icofont-database-add"=>
        
        "database-add",
        
        
        
        
        
        
        "icofont-database-locked"=>
        
        "database-locked",
        
        
        
        
        
        
        "icofont-database-remove"=>
        
        "database-remove",
        
        
        
        
        
        
        "icofont-database"=>
        
        "database",
        
        
        
        
        
        
        "icofont-delete"=>
        
        "delete",
        
        
        
        
        
        
        "icofont-diamond"=>
        
        "diamond",
        
        
        
        
        
        
        "icofont-dice-multiple"=>
        
        "dice-multiple",
        
        
        
        
        
        
        "icofont-dice"=>
        
        "dice",
        
        
        
        
        
        
        "icofont-disc"=>
        
        "disc",
        
        
        
        
        
        
        "icofont-diskette"=>
        
        "diskette",
        
        
        
        
        
        
        "icofont-document-folder"=>
        
        "document-folder",
        
        
        
        
        
        
        "icofont-download-alt"=>
        
        "download-alt",
        
        
        
        
        
        
        "icofont-download"=>
        
        "download",
        
        
        
        
        
        
        "icofont-downloaded"=>
        
        "downloaded",
        
        
        
        
        
        
        "icofont-drag"=>
        
        "drag",
        
        
        
        
        
        
        "icofont-drag1"=>
        
        "drag1",
        
        
        
        
        
        
        "icofont-drag2"=>
        
        "drag2",
        
        
        
        
        
        
        "icofont-drag3"=>
        
        "drag3",
        
        
        
        
        
        
        "icofont-earth"=>
        
        "earth",
        
        
        
        
        
        
        "icofont-ebook"=>
        
        "ebook",
        
        
        
        
        
        
        "icofont-edit"=>
        
        "edit",
        
        
        
        
        
        
        "icofont-eject"=>
        
        "eject",
        
        
        
        
        
        
        "icofont-email"=>
        
        "email",
        
        
        
        
        
        
        "icofont-envelope-open"=>
        
        "envelope-open",
        
        
        
        
        
        
        "icofont-envelope"=>
        
        "envelope",
        
        
        
        
        
        
        "icofont-eraser"=>
        
        "eraser",
        
        
        
        
        
        
        "icofont-error"=>
        
        "error",
        
        
        
        
        
        
        "icofont-excavator"=>
        
        "excavator",
        
        
        
        
        
        
        "icofont-exchange"=>
        
        "exchange",
        
        
        
        
        
        
        "icofont-exclamation-circle"=>
        
        "exclamation-circle",
        
        
        
        
        
        
        "icofont-exclamation-square"=>
        
        "exclamation-square",
        
        
        
        
        
        
        "icofont-exclamation-tringle"=>
        
        "exclamation-tringle",
        
        
        
        
        
        
        "icofont-exclamation"=>
        
        "exclamation",
        
        
        
        
        
        
        "icofont-exit"=>
        
        "exit",
        
        
        
        
        
        
        "icofont-expand"=>
        
        "expand",
        
        
        
        
        
        
        "icofont-external-link"=>
        
        "external-link",
        
        
        
        
        
        
        "icofont-external"=>
        
        "external",
        
        
        
        
        
        
        "icofont-eye-alt"=>
        
        "eye-alt",
        
        
        
        
        
        
        "icofont-eye-blocked"=>
        
        "eye-blocked",
        
        
        
        
        
        
        "icofont-eye-dropper"=>
        
        "eye-dropper",
        
        
        
        
        
        
        "icofont-eye"=>
        
        "eye",
        
        
        
        
        
        
        "icofont-favourite"=>
        
        "favourite",
        
        
        
        
        
        
        "icofont-fax"=>
        
        "fax",
        
        
        
        
        
        
        "icofont-file-fill"=>
        
        "file-fill",
        
        
        
        
        
        
        "icofont-film"=>
        
        "film",
        
        
        
        
        
        
        "icofont-filter"=>
        
        "filter",
        
        
        
        
        
        
        "icofont-fire-alt"=>
        
        "fire-alt",
        
        
        
        
        
        
        "icofont-fire-burn"=>
        
        "fire-burn",
        
        
        
        
        
        
        "icofont-fire"=>
        
        "fire",
        
        
        
        
        
        
        "icofont-flag-alt-1"=>
        
        "flag-alt-1",
        
        
        
        
        
        
        "icofont-flag-alt-2"=>
        
        "flag-alt-2",
        
        
        
        
        
        
        "icofont-flag"=>
        
        "flag",
        
        
        
        
        
        
        "icofont-flame-torch"=>
        
        "flame-torch",
        
        
        
        
        
        
        "icofont-flash-light"=>
        
        "flash-light",
        
        
        
        
        
        
        "icofont-flash"=>
        
        "flash",
        
        
        
        
        
        
        "icofont-flask"=>
        
        "flask",
        
        
        
        
        
        
        "icofont-focus"=>
        
        "focus",
        
        
        
        
        
        
        "icofont-folder-open"=>
        
        "folder-open",
        
        
        
        
        
        
        "icofont-folder"=>
        
        "folder",
        
        
        
        
        
        
        "icofont-foot-print"=>
        
        "foot-print",
        
        
        
        
        
        
        "icofont-garbage"=>
        
        "garbage",
        
        
        
        
        
        
        "icofont-gear-alt"=>
        
        "gear-alt",
        
        
        
        
        
        
        "icofont-gear"=>
        
        "gear",
        
        
        
        
        
        
        "icofont-gears"=>
        
        "gears",
        
        
        
        
        
        
        "icofont-gift"=>
        
        "gift",
        
        
        
        
        
        
        "icofont-glass"=>
        
        "glass",
        
        
        
        
        
        
        "icofont-globe"=>
        
        "globe",
        
        
        
        
        
        
        "icofont-graffiti"=>
        
        "graffiti",
        
        
        
        
        
        
        "icofont-grocery"=>
        
        "grocery",
        
        
        
        
        
        
        "icofont-hand"=>
        
        "hand",
        
        
        
        
        
        
        "icofont-hanger"=>
        
        "hanger",
        
        
        
        
        
        
        "icofont-hard-disk"=>
        
        "hard-disk",
        
        
        
        
        
        
        "icofont-heart-alt"=>
        
        "heart-alt",
        
        
        
        
        
        
        "icofont-heart"=>
        
        "heart",
        
        
        
        
        
        
        "icofont-history"=>
        
        "history",
        
        
        
        
        
        
        "icofont-home"=>
        
        "home",
        
        
        
        
        
        
        "icofont-horn"=>
        
        "horn",
        
        
        
        
        
        
        "icofont-hour-glass"=>
        
        "hour-glass",
        
        
        
        
        
        
        "icofont-id"=>
        
        "id",
        
        
        
        
        
        
        "icofont-image"=>
        
        "image",
        
        
        
        
        
        
        "icofont-inbox"=>
        
        "inbox",
        
        
        
        
        
        
        "icofont-infinite"=>
        
        "infinite",
        
        
        
        
        
        
        "icofont-info-circle"=>
        
        "info-circle",
        
        
        
        
        
        
        "icofont-info-square"=>
        
        "info-square",
        
        
        
        
        
        
        "icofont-info"=>
        
        "info",
        
        
        
        
        
        
        "icofont-institution"=>
        
        "institution",
        
        
        
        
        
        
        "icofont-interface"=>
        
        "interface",
        
        
        
        
        
        
        "icofont-invisible"=>
        
        "invisible",
        
        
        
        
        
        
        "icofont-jacket"=>
        
        "jacket",
        
        
        
        
        
        
        "icofont-jar"=>
        
        "jar",
        
        
        
        
        
        
        "icofont-jewlery"=>
        
        "jewlery",
        
        
        
        
        
        
        "icofont-karate"=>
        
        "karate",
        
        
        
        
        
        
        "icofont-key-hole"=>
        
        "key-hole",
        
        
        
        
        
        
        "icofont-key"=>
        
        "key",
        
        
        
        
        
        
        "icofont-label"=>
        
        "label",
        
        
        
        
        
        
        "icofont-lamp"=>
        
        "lamp",
        
        
        
        
        
        
        "icofont-layers"=>
        
        "layers",
        
        
        
        
        
        
        "icofont-layout"=>
        
        "layout",
        
        
        
        
        
        
        "icofont-leaf"=>
        
        "leaf",
        
        
        
        
        
        
        "icofont-leaflet"=>
        
        "leaflet",
        
        
        
        
        
        
        "icofont-learn"=>
        
        "learn",
        
        
        
        
        
        
        "icofont-lego"=>
        
        "lego",
        
        
        
        
        
        
        "icofont-lens"=>
        
        "lens",
        
        
        
        
        
        
        "icofont-letter"=>
        
        "letter",
        
        
        
        
        
        
        "icofont-letterbox"=>
        
        "letterbox",
        
        
        
        
        
        
        "icofont-library"=>
        
        "library",
        
        
        
        
        
        
        "icofont-license"=>
        
        "license",
        
        
        
        
        
        
        "icofont-life-bouy"=>
        
        "life-bouy",
        
        
        
        
        
        
        "icofont-life-buoy"=>
        
        "life-buoy",
        
        
        
        
        
        
        "icofont-life-jacket"=>
        
        "life-jacket",
        
        
        
        
        
        
        "icofont-life-ring"=>
        
        "life-ring",
        
        
        
        
        
        
        "icofont-light-bulb"=>
        
        "light-bulb",
        
        
        
        
        
        
        "icofont-lighter"=>
        
        "lighter",
        
        
        
        
        
        
        "icofont-lightning-ray"=>
        
        "lightning-ray",
        
        
        
        
        
        
        "icofont-like"=>
        
        "like",
        
        
        
        
        
        
        "icofont-line-height"=>
        
        "line-height",
        
        
        
        
        
        
        "icofont-link-alt"=>
        
        "link-alt",
        
        
        
        
        
        
        "icofont-link"=>
        
        "link",
        
        
        
        
        
        
        "icofont-list"=>
        
        "list",
        
        
        
        
        
        
        "icofont-listening"=>
        
        "listening",
        
        
        
        
        
        
        "icofont-listine-dots"=>
        
        "listine-dots",
        
        
        
        
        
        
        "icofont-listing-box"=>
        
        "listing-box",
        
        
        
        
        
        
        "icofont-listing-number"=>
        
        "listing-number",
        
        
        
        
        
        
        "icofont-live-support"=>
        
        "live-support",
        
        
        
        
        
        
        "icofont-location-arrow"=>
        
        "location-arrow",
        
        
        
        
        
        
        "icofont-location-pin"=>
        
        "location-pin",
        
        
        
        
        
        
        "icofont-lock"=>
        
        "lock",
        
        
        
        
        
        
        "icofont-login"=>
        
        "login",
        
        
        
        
        
        
        "icofont-logout"=>
        
        "logout",
        
        
        
        
        
        
        "icofont-lollipop"=>
        
        "lollipop",
        
        
        
        
        
        
        "icofont-long-drive"=>
        
        "long-drive",
        
        
        
        
        
        
        "icofont-look"=>
        
        "look",
        
        
        
        
        
        
        "icofont-loop"=>
        
        "loop",
        
        
        
        
        
        
        "icofont-luggage"=>
        
        "luggage",
        
        
        
        
        
        
        "icofont-lunch"=>
        
        "lunch",
        
        
        
        
        
        
        "icofont-lungs"=>
        
        "lungs",
        
        
        
        
        
        
        "icofont-magic-alt"=>
        
        "magic-alt",
        
        
        
        
        
        
        "icofont-magic"=>
        
        "magic",
        
        
        
        
        
        
        "icofont-magnet"=>
        
        "magnet",
        
        
        
        
        
        
        "icofont-mail-box"=>
        
        "mail-box",
        
        
        
        
        
        
        "icofont-mail"=>
        
        "mail",
        
        
        
        
        
        
        "icofont-male"=>
        
        "male",
        
        
        
        
        
        
        "icofont-map-pins"=>
        
        "map-pins",
        
        
        
        
        
        
        "icofont-map"=>
        
        "map",
        
        
        
        
        
        
        "icofont-maximize"=>
        
        "maximize",
        
        
        
        
        
        
        "icofont-measure"=>
        
        "measure",
        
        
        
        
        
        
        "icofont-medicine"=>
        
        "medicine",
        
        
        
        
        
        
        "icofont-mega-phone"=>
        
        "mega-phone",
        
        
        
        
        
        
        "icofont-megaphone-alt"=>
        
        "megaphone-alt",
        
        
        
        
        
        
        "icofont-megaphone"=>
        
        "megaphone",
        
        
        
        
        
        
        "icofont-memorial"=>
        
        "memorial",
        
        
        
        
        
        
        "icofont-memory-card"=>
        
        "memory-card",
        
        
        
        
        
        
        "icofont-mic-mute"=>
        
        "mic-mute",
        
        
        
        
        
        
        "icofont-mic"=>
        
        "mic",
        
        
        
        
        
        
        "icofont-military"=>
        
        "military",
        
        
        
        
        
        
        "icofont-mill"=>
        
        "mill",
        
        
        
        
        
        
        "icofont-minus-circle"=>
        
        "minus-circle",
        
        
        
        
        
        
        "icofont-minus-square"=>
        
        "minus-square",
        
        
        
        
        
        
        "icofont-minus"=>
        
        "minus",
        
        
        
        
        
        
        "icofont-mobile-phone"=>
        
        "mobile-phone",
        
        
        
        
        
        
        "icofont-molecule"=>
        
        "molecule",
        
        
        
        
        
        
        "icofont-money"=>
        
        "money",
        
        
        
        
        
        
        "icofont-moon"=>
        
        "moon",
        
        
        
        
        
        
        "icofont-mop"=>
        
        "mop",
        
        
        
        
        
        
        "icofont-muffin"=>
        
        "muffin",
        
        
        
        
        
        
        "icofont-mustache"=>
        
        "mustache",
        
        
        
        
        
        
        "icofont-navigation-menu"=>
        
        "navigation-menu",
        
        
        
        
        
        
        "icofont-navigation"=>
        
        "navigation",
        
        
        
        
        
        
        "icofont-network-tower"=>
        
        "network-tower",
        
        
        
        
        
        
        "icofont-network"=>
        
        "network",
        
        
        
        
        
        
        "icofont-news"=>
        
        "news",
        
        
        
        
        
        
        "icofont-newspaper"=>
        
        "newspaper",
        
        
        
        
        
        
        "icofont-no-smoking"=>
        
        "no-smoking",
        
        
        
        
        
        
        "icofont-not-allowed"=>
        
        "not-allowed",
        
        
        
        
        
        
        "icofont-notebook"=>
        
        "notebook",
        
        
        
        
        
        
        "icofont-notepad"=>
        
        "notepad",
        
        
        
        
        
        
        "icofont-notification"=>
        
        "notification",
        
        
        
        
        
        
        "icofont-numbered"=>
        
        "numbered",
        
        
        
        
        
        
        "icofont-opposite"=>
        
        "opposite",
        
        
        
        
        
        
        "icofont-optic"=>
        
        "optic",
        
        
        
        
        
        
        "icofont-options"=>
        
        "options",
        
        
        
        
        
        
        "icofont-package"=>
        
        "package",
        
        
        
        
        
        
        "icofont-page"=>
        
        "page",
        
        
        
        
        
        
        "icofont-paint"=>
        
        "paint",
        
        
        
        
        
        
        "icofont-paper-plane"=>
        
        "paper-plane",
        
        
        
        
        
        
        "icofont-paperclip"=>
        
        "paperclip",
        
        
        
        
        
        
        "icofont-papers"=>
        
        "papers",
        
        
        
        
        
        
        "icofont-pay"=>
        
        "pay",
        
        
        
        
        
        
        "icofont-penguin-linux"=>
        
        "penguin-linux",
        
        
        
        
        
        
        "icofont-pestle"=>
        
        "pestle",
        
        
        
        
        
        
        "icofont-phone-circle"=>
        
        "phone-circle",
        
        
        
        
        
        
        "icofont-phone"=>
        
        "phone",
        
        
        
        
        
        
        "icofont-picture"=>
        
        "picture",
        
        
        
        
        
        
        "icofont-pine"=>
        
        "pine",
        
        
        
        
        
        
        "icofont-pixels"=>
        
        "pixels",
        
        
        
        
        
        
        "icofont-plugin"=>
        
        "plugin",
        
        
        
        
        
        
        "icofont-plus-circle"=>
        
        "plus-circle",
        
        
        
        
        
        
        "icofont-plus-square"=>
        
        "plus-square",
        
        
        
        
        
        
        "icofont-plus"=>
        
        "plus",
        
        
        
        
        
        
        "icofont-polygonal"=>
        
        "polygonal",
        
        
        
        
        
        
        "icofont-power"=>
        
        "power",
        
        
        
        
        
        
        "icofont-price"=>
        
        "price",
        
        
        
        
        
        
        "icofont-print"=>
        
        "print",
        
        
        
        
        
        
        "icofont-puzzle"=>
        
        "puzzle",
        
        
        
        
        
        
        "icofont-qr-code"=>
        
        "qr-code",
        
        
        
        
        
        
        "icofont-queen"=>
        
        "queen",
        
        
        
        
        
        
        "icofont-question-circle"=>
        
        "question-circle",
        
        
        
        
        
        
        "icofont-question-square"=>
        
        "question-square",
        
        
        
        
        
        
        "icofont-question"=>
        
        "question",
        
        
        
        
        
        
        "icofont-quote-left"=>
        
        "quote-left",
        
        
        
        
        
        
        "icofont-quote-right"=>
        
        "quote-right",
        
        
        
        
        
        
        "icofont-random"=>
        
        "random",
        
        
        
        
        
        
        "icofont-recycle"=>
        
        "recycle",
        
        
        
        
        
        
        "icofont-refresh"=>
        
        "refresh",
        
        
        
        
        
        
        "icofont-repair"=>
        
        "repair",
        
        
        
        
        
        
        "icofont-reply-all"=>
        
        "reply-all",
        
        
        
        
        
        
        "icofont-reply"=>
        
        "reply",
        
        
        
        
        
        
        "icofont-resize"=>
        
        "resize",
        
        
        
        
        
        
        "icofont-responsive"=>
        
        "responsive",
        
        
        
        
        
        
        "icofont-retweet"=>
        
        "retweet",
        
        
        
        
        
        
        "icofont-road"=>
        
        "road",
        
        
        
        
        
        
        "icofont-robot"=>
        
        "robot",
        
        
        
        
        
        
        "icofont-royal"=>
        
        "royal",
        
        
        
        
        
        
        "icofont-rss-feed"=>
        
        "rss-feed",
        
        
        
        
        
        
        "icofont-safety"=>
        
        "safety",
        
        
        
        
        
        
        "icofont-sale-discount"=>
        
        "sale-discount",
        
        
        
        
        
        
        "icofont-satellite"=>
        
        "satellite",
        
        
        
        
        
        
        "icofont-send-mail"=>
        
        "send-mail",
        
        
        
        
        
        
        "icofont-server"=>
        
        "server",
        
        
        
        
        
        
        "icofont-settings-alt"=>
        
        "settings-alt",
        
        
        
        
        
        
        "icofont-settings"=>
        
        "settings",
        
        
        
        
        
        
        "icofont-share-alt"=>
        
        "share-alt",
        
        
        
        
        
        
        "icofont-share-boxed"=>
        
        "share-boxed",
        
        
        
        
        
        
        "icofont-share"=>
        
        "share",
        
        
        
        
        
        
        "icofont-shield"=>
        
        "shield",
        
        
        
        
        
        
        "icofont-shopping-cart"=>
        
        "shopping-cart",
        
        
        
        
        
        
        "icofont-sign-in"=>
        
        "sign-in",
        
        
        
        
        
        
        "icofont-sign-out"=>
        
        "sign-out",
        
        
        
        
        
        
        "icofont-signal"=>
        
        "signal",
        
        
        
        
        
        
        "icofont-site-map"=>
        
        "site-map",
        
        
        
        
        
        
        "icofont-smart-phone"=>
        
        "smart-phone",
        
        
        
        
        
        
        "icofont-soccer"=>
        
        "soccer",
        
        
        
        
        
        
        "icofont-sort-alt"=>
        
        "sort-alt",
        
        
        
        
        
        
        "icofont-sort"=>
        
        "sort",
        
        
        
        
        
        
        "icofont-space"=>
        
        "space",
        
        
        
        
        
        
        "icofont-spanner"=>
        
        "spanner",
        
        
        
        
        
        
        "icofont-speech-comments"=>
        
        "speech-comments",
        
        
        
        
        
        
        "icofont-speed-meter"=>
        
        "speed-meter",
        
        
        
        
        
        
        "icofont-spinner-alt-1"=>
        
        "spinner-alt-1",
        
        
        
        
        
        
        "icofont-spinner-alt-2"=>
        
        "spinner-alt-2",
        
        
        
        
        
        
        "icofont-spinner-alt-3"=>
        
        "spinner-alt-3",
        
        
        
        
        
        
        "icofont-spinner-alt-4"=>
        
        "spinner-alt-4",
        
        
        
        
        
        
        "icofont-spinner-alt-5"=>
        
        "spinner-alt-5",
        
        
        
        
        
        
        "icofont-spinner-alt-6"=>
        
        "spinner-alt-6",
        
        
        
        
        
        
        "icofont-spinner"=>
        
        "spinner",
        
        
        
        
        
        
        "icofont-spreadsheet"=>
        
        "spreadsheet",
        
        
        
        
        
        
        "icofont-square"=>
        
        "square",
        
        
        
        
        
        
        "icofont-ssl-security"=>
        
        "ssl-security",
        
        
        
        
        
        
        "icofont-star-alt-1"=>
        
        "star-alt-1",
        
        
        
        
        
        
        "icofont-star-alt-2"=>
        
        "star-alt-2",
        
        
        
        
        
        
        "icofont-star"=>
        
        "star",
        
        
        
        
        
        
        "icofont-street-view"=>
        
        "street-view",
        
        
        
        
        
        
        "icofont-support-faq"=>
        
        "support-faq",
        
        
        
        
        
        
        "icofont-tack-pin"=>
        
        "tack-pin",
        
        
        
        
        
        
        "icofont-tag"=>
        
        "tag",
        
        
        
        
        
        
        "icofont-tags"=>
        
        "tags",
        
        
        
        
        
        
        "icofont-tasks-alt"=>
        
        "tasks-alt",
        
        
        
        
        
        
        "icofont-tasks"=>
        
        "tasks",
        
        
        
        
        
        
        "icofont-telephone"=>
        
        "telephone",
        
        
        
        
        
        
        "icofont-telescope"=>
        
        "telescope",
        
        
        
        
        
        
        "icofont-terminal"=>
        
        "terminal",
        
        
        
        
        
        
        "icofont-thumbs-down"=>
        
        "thumbs-down",
        
        
        
        
        
        
        "icofont-thumbs-up"=>
        
        "thumbs-up",
        
        
        
        
        
        
        "icofont-tick-boxed"=>
        
        "tick-boxed",
        
        
        
        
        
        
        "icofont-tick-mark"=>
        
        "tick-mark",
        
        
        
        
        
        
        "icofont-ticket"=>
        
        "ticket",
        
        
        
        
        
        
        "icofont-tie"=>
        
        "tie",
        
        
        
        
        
        
        "icofont-toggle-off"=>
        
        "toggle-off",
        
        
        
        
        
        
        "icofont-toggle-on"=>
        
        "toggle-on",
        
        
        
        
        
        
        "icofont-tools-alt-2"=>
        
        "tools-alt-2",
        
        
        
        
        
        
        "icofont-tools"=>
        
        "tools",
        
        
        
        
        
        
        "icofont-touch"=>
        
        "touch",
        
        
        
        
        
        
        "icofont-traffic-light"=>
        
        "traffic-light",
        
        
        
        
        
        
        "icofont-transparent"=>
        
        "transparent",
        
        
        
        
        
        
        "icofont-tree"=>
        
        "tree",
        
        
        
        
        
        
        "icofont-unique-idea"=>
        
        "unique-idea",
        
        
        
        
        
        
        "icofont-unlock"=>
        
        "unlock",
        
        
        
        
        
        
        "icofont-unlocked"=>
        
        "unlocked",
        
        
        
        
        
        
        "icofont-upload-alt"=>
        
        "upload-alt",
        
        
        
        
        
        
        "icofont-upload"=>
        
        "upload",
        
        
        
        
        
        
        "icofont-usb-drive"=>
        
        "usb-drive",
        
        
        
        
        
        
        "icofont-usb"=>
        
        "usb",
        
        
        
        
        
        
        "icofont-vector-path"=>
        
        "vector-path",
        
        
        
        
        
        
        "icofont-verification-check"=>
        
        "verification-check",
        
        
        
        
        
        
        "icofont-wall-clock"=>
        
        "wall-clock",
        
        
        
        
        
        
        "icofont-wall"=>
        
        "wall",
        
        
        
        
        
        
        "icofont-wallet"=>
        
        "wallet",
        
        
        
        
        
        
        "icofont-warning-alt"=>
        
        "warning-alt",
        
        
        
        
        
        
        "icofont-warning"=>
        
        "warning",
        
        
        
        
        
        
        "icofont-water-drop"=>
        
        "water-drop",
        
        
        
        
        
        
        "icofont-web"=>
        
        "web",
        
        
        
        
        
        
        "icofont-wheelchair"=>
        
        "wheelchair",
        
        
        
        
        
        
        "icofont-wifi-alt"=>
        
        "wifi-alt",
        
        
        
        
        
        
        "icofont-wifi"=>
        
        "wifi",
        
        
        
        
        
        
        "icofont-world"=>
        
        "world",
        
        
        
        
        
        
        "icofont-zigzag"=>
        
        "zigzag",
        
        
        
        
        
        
        "icofont-zipped"=>
        
        "zipped",
        ];
       
        $massicons=\App\Models\Icon::all();
        if($massicons->count()==0)
        {$type=0;
            foreach($icons as $key=>$icon){
                \App\Models\Icon::create(
                    [
                        'type'=>$type,
                        'name'=>$icon,
                    ]
                    );

            }
        }
    }
}
