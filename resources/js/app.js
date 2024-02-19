import angular from 'angular';
import './bootstrap';

document.getElementById('year').textContent = new Date().getFullYear();

var FeedMillApp = angular.module('FeedMillApp', []);


