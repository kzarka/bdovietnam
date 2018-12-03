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
    $trail->parent('home');
    $categoryIdentity = '';
    if ($category) {
        $categoryIdentity = $category->slug ?: $category->id;
    }
    $trail->push(($category) ? $category->name : 'Category', route('category', $categoryIdentity));
});

// Home > [Category] > [Post]
Breadcrumbs::for('post', function ($trail, $post) {
    $category = $post['category'];
    $postIdentity = '';
    if (isset($post->id)) {
        $postIdentity = $post->slug ?: $post->id;
    }
    $trail->parent('category', $category);
    $trail->push(isset($post->id) ? $post->title : 'Post not found', route('post', ['categoryIdentity' => $category->slug ?: $category->id, 'postIdentity' => $postIdentity]));
});