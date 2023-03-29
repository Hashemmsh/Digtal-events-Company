<?php

namespace App\Traits;


trait Trans
 {
/////////////////////////////////////////////name/////////////////////////////////////////////
            public function getTransNameAttribute()
            {
                if ($this->name) {

                    return json_decode($this->name , true)[app()->currentLocale()];
                }

                return $this->name;
            }

            public function getNameEnAttribute()
            {

                if ($this->name) {

                    return json_decode($this->name , true)['en'];
                }

                return '';
            }

            public function getNameArAttribute()
            {
                if ($this->name) {

                    return json_decode($this->name , true)['ar'];
                }

                return '';
            }

/////////////////////////////// description ///////////////////////////////////////////////

            public function getTransDescriptionAttribute()
            {
                if ($this->description) {

                    return json_decode($this->description , true)[app()->currentLocale()];
                }

                return $this->description;
            }

            public function getDescriptionEnAttribute()
            {

                if ($this->description) {

                    return json_decode($this->description , true)['en'];
                }

                return '';
            }

            public function getDescriptionArAttribute()
            {
                if ($this->description) {

                    return json_decode($this->description , true)['ar'];
                }

                return '';
            }


/////////////////////////////////title/////////////////////////////////////////

            public function getTransTitleAttribute()
            {
                if ($this->title) {

                    return json_decode($this->title , true)[app()->currentLocale()];
                }

                return $this->title;
            }

            public function getTitleEnAttribute()
            {

                if ($this->title) {

                    return json_decode($this->title , true)['en'];
                }

                return '';
            }

            public function getTitleArAttribute()
            {
                if ($this->title) {

                    return json_decode($this->title , true)['ar'];
                }

                return '';
            }
            ////////////////////////////////////
            public function getTransLoungeAttribute()
            {
                if ($this->lounge) {

                    return json_decode($this->lounge , true)[app()->currentLocale()];
                }

                return $this->lounge;
            }

            public function getLoungeEnAttribute()
            {

                if ($this->lounge) {

                    return json_decode($this->lounge , true)['en'];
                }

                return '';
            }

            public function getLoungeArAttribute()
            {
                if ($this->lounge) {

                    return json_decode($this->lounge , true)['ar'];
                }

                return '';
            }

 }
