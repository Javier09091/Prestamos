<?php

// Configuraciones de encriptación y acceso a la BD

const SERVER="localhost";
const DB= "prestamos";

const USER = "root";
const PASSWORD = "";

const SGBD = "mysql:host=".SERVER.";dbname=".DB;

const METHOD = "AES-256-CBC";

const SECRET_KEY = '$PRESTAMOS@2020';

const SECRET_IV = '180430';