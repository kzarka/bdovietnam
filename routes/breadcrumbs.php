<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

// Home > About
Breadcrumbs::for('about', function ($trail) {
    $trail->parent('home');
    $trail->push('About', route('about'));
});

// Home > Classes
Breadcrumbs::for('class', function ($trail) {
    $trail->parent('home');
    $trail->push('Classes', route('class'));
});

// Home > [Category]
Breadcrumbs::for('category', function ($trail, $category) {
    \Log::info($category);
    $trail->parent('home');
    $trail->push($category->name, route('category', $category->slug ?: $category->id));
});

// Home > [Category] > [Post]
Breadcrumbs::for('post', function ($trail, $post) {
    $trail->parent('category', $post->category);
    $trail->push($post->title, route('post', ['categoryIdentity' => $post->category->slug ?: $post->category->id, 'postIdentity' => $post->slug ?: $post->id]));
});