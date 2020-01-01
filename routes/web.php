<?php

Route::get('/{any}', 'ApplicationController')->where('any', '.*');
