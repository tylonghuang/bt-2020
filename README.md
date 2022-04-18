# BT-2020

This repository contains the code of the bachelor thesis from Long Hoang Nguyen & Georg David Ritterbusch. In the course of the thesis, we explored the open-source web framework A-Frame and its potential to visualize large amounts of data from data warehouses. Our exploration resulted in a tool that allows users to virtually walk through data like in a real warehouse.

## Preview
![](/assets/preview.gif "Tool Preview")

## Tools and technologies
- Visualization: [A-Frame](https://aframe.io/)
- Backend: [XAMPP](https://www.apachefriends.org/index.html) and [MySQL](https://www.mysql.com/)
- Testing: [Firefox](https://www.mozilla.org/) and [HTC Vive](https://www.vive.com/)

## Software architecture
![](/assets/architecture.svg "Visualization of Architecture")

## Setup and usage
* Set up your controllers in case you have some
* Start up the local development environment with XAMPP
* Load the test data:
  * Navigate to `localhost/phpmyadmin`
  * Create a new database `gbi`
  * Import the `gbi.sql`file from the assets folder
* Open `localhost/bt-2020` in Firefox and activate VR mode
* Select the columns you want to investigate and press `GENERATE`
* Navigate through the data with the controllers or your keyboard

## License
Feel free to use the contents in consideration of [Creative Commons Attribution 4.0](https://creativecommons.org/licenses/by/4.0/). In case there are any further inquiries, you can also contact the authors.

## Acknowledgement
At this point, we expecially want to express gratitude to our supervisor Prof. Dr.-Ing. Michael Höding for providing us with the necessary hardware and data to test the application.
