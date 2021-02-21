# A mini Content Management System (CMS)

## Table of contents

* [About](#general-info)
* [Technologies](#technologies)
* [Deployment](#deployment)
* [Demonstation](#demonstration )
* [Licence](#licence)

## About

We are using the latest Laravel framework version (8.x) to create an elementary-stage CMS platform. Specifically, a user can add, update and delete post and category entries. All the administration screens are only accessible by authenticated users (ie, there is a registration/login system). Furthermore, to satisfy the data storage needs, we are using MySQL as the platform's database.

For this Project we suppose that we need to create two objects (Posts and Categories) with the following attributes.

Post:

- id
- title
- slug
- subtitle
- content 
- created and updated timestamps
- published_at timestamp
- single file upload

Category: 

- id
- title
- slug
- created_at
- updated_at

Regarding Post Management the following views have been created:

- A table with all entries and pagination links. This page allows the administrator to add or edit a post.

- A Post create view where the user can create a new Post.

- A Post edit view where the administrator can update the fields of a Post. On this page, the user can delete the Post. Additionally, when the user chooses to delete the Post, a Sweet Alert 2 modal opens, prompting the user to confirm his action. 

- A publicly available page to view the Post contents.

Similarly, with the Post views, there are some views to manage Categories for the Posts. 

Finally, the administrator should be able to create/update Categories and subsequently relate those Categories to multiple Posts.

This Project's implementation is based on the following tutorial mini-series: https://laracasts.com/series/laravel-from-scratch-2018, and Laravel's official [documentation](https://laravel.com/docs).

## Technologies

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

To complete this Project we have primarily used Laravel, which is a PHP Web Framework. Also, we have extensively used the CSS Framework [Bootstrap](https://getbootstrap.com/).

## Deployment

## Demonstration