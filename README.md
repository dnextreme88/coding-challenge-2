# Coding Challenge 2

## Coding Challenge Description
Object of the game is to move all the disks over to Tower 3 (with your mouse). But you cannot place a larger disk onto a smaller disk.

## How to run
### Pre-requisites
This coding challenge uses the [Laravel framework](https://laravel.com/docs/11.x) so this will require package managers to install the dependencies.
1. Download the latest version of Composer from https://getcomposer.org/
2. Download the latest version of NodeJs from https://nodejs.org/en.
3. Download the latest version of XAMPP from https://www.apachefriends.org/ that uses PHP 8.2.12. After downloading, the plugins that matter is PHP from the installation window. Since this doesn't use any database logic, MySQL isn't required.
4. You need to set the environment variables of the PHP version. This must point to the PHP version that XAMPP is using. Search for `environment variables` in your computer. Click the `Environment Variables...` button.
5. From here, find the `Path` variable and double-click it. Click the `New` button and add the directory where PHP is installed. Usually, this would be `C:\xampp\php`.

### Instructions
1. Unzip the contents of this repository to your desired location, preferably the Desktop for easy access.
2. Using Powershell/CMD or any terminal program, open up two instances of your terminal from your OS.
3. Using one of the terminals, go to the location where the contents of the repository was unzipped. For example `cd Desktop`.
4. Run both `composer install` and `npm install` to install the dependencies.
5. Run both `npm run dev` to run a Vite instance and `php artisan serve` for the server.
6. Open a web browser and navigate to `http://127.0.0.1:8000`. Simply enter words into the input below. You may toggle dark mode on the upper right screen, if desired.
7. If it complains about dependencies not installing, try running `composer update` and `npm update`.

## Challenges
- This challenge is the hardest one to solve. I had to look up a few resources regarding stacks and queues as well as figure out a better way to do an if-else logic for checking if the disc is bigger on top etc. Luckily, there's a good resource I found out. With so many factors to consider, I was able to overcome such challenge.
- This challenge features the ability to toggle between light and dark modes. Though a small feature, it's a nifty feature to implement and I enjoyed toggling it on and off after a day's work.

## Defects
- This is a simple drag and drop code, dragging an element from one side to another. Since it relies on a lot of logic and functions, the code will break if these functions were changed. For instance, the logic for checking if a disc on a tower is smaller than the disc being dragged would be a nuisance to solve because I'm using the `width` property to compare their sizes.
- The code could use a few more improvements. An ability to see the number of moves made would be nice. Also the ability to reset the discs would be lovely. Apart from that, the code is great enough.

## Disclaimer
- Credits to the people at TechTaxi Inc. for giving me the opportunity to do this wonderful coding challenge. I'm grateful to have learned from this coding challenge, whether I get hired for this or not.

All rights reserved &copy; October 10, 2024
