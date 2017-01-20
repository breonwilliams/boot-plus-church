(function() {
	tinymce.PluginManager.add('my_mce_button', function( editor, url ) {
		editor.addButton( 'my_mce_button', {
			text: 'Shortcodes',
			icon: false,
			type: 'menubutton',
			menu: [

				{
                    text: 'Full Width Sections',
                    menu: [
                        {
                            text: 'Background Video Section',
                            onclick: function() {
                                editor.insertContent('[background_vid poster="" mp4="" padding="pad-100" overlay=""][/background_vid]');
                            }
                        },
                        {
                            text: 'Background Section Color',
                            onclick: function() {
                                editor.insertContent('[color_section bgcolor="" class=""][/color_section]');
                            }
                        },
                        {
                            text: 'Background Section Image',
                            onclick: function() {
                                editor.insertContent('[img_section bgimg="" class="" overlay=""][/img_section]');
                            }
                        },
                        {
                            text: 'Background Parallax Image',
                            onclick: function() {
                                editor.insertContent('[parallax_section bgimg="" class="" overlay=""][/parallax_section]');
                            }
                        }

                    ]
                },

                {
                    text: 'Modal',
                    onclick: function() {
                                editor.insertContent('[boot_modal button="Modal button" title="Modal Title" class="btn btn-primary" target="modal1" closeclass="btn btn-default" modalsize="modal-lg"][/boot_modal]');
                            }
                },
				
				{
                    text: 'Popup Video',
                    onclick: function() {
                                editor.insertContent('[popup_video class="" url=""][/popup_video]');
                            }
                },
                {
                    text: 'Recent Event',
                    menu: [
                        {
                            text: 'Recent Events List 1',
                            onclick: function() {
                                editor.insertContent('[events-tribe-list cat="" number="2"]');
                            }
                        },
                        {
                            text: 'Recent Events List 2',
                            onclick: function() {
                                editor.insertContent('[events-tribe-list2 cat="" number="2"]');
                            }
                        },
                        {
                            text: 'Recent Events Carousel',
                            onclick: function() {
                                editor.insertContent('[events-tribe-list3 cat="" number="2"]');
                            }
                        },
                    ]
                },
                {
                    text: 'Recent Posts',
                    menu: [
                        {
                            text: 'Recent Posts List',
                            onclick: function() {
                                editor.insertContent('[list_recent_posts category="" class="" ptype="" per_page="4"]');
                            }
                        },
                        {
                            text: 'Recent Posts Thumbnails',
                            onclick: function() {
                                editor.insertContent('[thumb_recent_posts column="col-md-4" class="" ptype="" per_page="4"]');
                            }
                        },
                        {
                            text: 'Recent Posts Carousel',
                            onclick: function() {
                                editor.insertContent('[carousel_recent_posts class="slick-1" category="" ptype="" per_page="8"]');
                            }
                        },
                        {
                            text: 'Related Posts Masonry',
                            onclick: function() {
                                editor.insertContent('[relatedposts ptype="sermons" max="4" column="col-md-4" class="" orderby="rand" label="Related Sermons"]');
                            }
                        },
                    ]
                },
                {
                    text: 'Staff Posts',
                    menu: [
                        {
                            text: 'Staff Posts Thumbnails',
                            onclick: function() {
                                editor.insertContent('[staff_posts class="" column="" category="" per_page="8" ptype="staff" role=""]');
                            }
                        },
                        {
                            text: 'Staff Card',
                            onclick: function() {
                                editor.insertContent('[staff_card class="" column="col-md-6" img_column="col-xs-4" content_column="col-xs-8" category="" per_page="8" ptype="staff" role=""]');
                            }
                        },
                        {
                            text: 'Staff Posts Tables',
                            onclick: function() {
                                editor.insertContent('[staff_tables category="" posts="2" ptype="staff" role=""]');
                            }
                        },
                    ]
                },
                {
                    text: 'Sermon Posts',
                    menu: [
                        {
                            text: 'Sermon DataTables',
                            onclick: function() {
                                editor.insertContent('[sermon_datatables category="" posts="-1" ptype="sermons" sermon_category=""]');
                            }
                        },
                        {
                            text: 'Sermon List',
                            onclick: function() {
                                editor.insertContent('[sermon_tables category=""  class="" per_page="8" ptype="sermons" sermon_category=""]');
                            }
                        },
                    ]
                },
                {
                    text: 'Custom Div',
                    onclick: function() {
                                editor.insertContent('[custom_div class=""][/custom_div]');
                            }
                },
                {
                    text: 'Percentage Circle',
                    onclick: function() {
                        editor.insertContent('[perc_circle size="medium" percent="30" class=""][/perc_circle]');
                    }
                },
                {
                    text: 'Carousel',
                    menu: [
                        {
                            text: 'Carousel Wrap',
                            onclick: function() {
                                editor.insertContent('[carousel_wrap class="slick-1"][/carousel_wrap]');
                            }
                        },
                        {
                            text: 'Carousel Item',
                            onclick: function() {
                                editor.insertContent('[carousel_item class=""][/carousel_item]');
                            }
                        },
                    ]
                },
                {
                    text: 'Custom Menu',
                    onclick: function() {
                        editor.insertContent('[listmenu menu="" menu_class=""]');
                    }
                },
                {
                    text: 'Search Overlay',
                    onclick: function() {
                        editor.insertContent('[search_overlay]');
                    }
                },
                {
                    text: 'Login/Logout',
                    menu: [
                        {
                            text: 'Login View',
                            onclick: function() {
                                editor.insertContent('[boot_logged_in]This is what user sees when logged in[/boot_logged_in]');
                            }
                        },
                        {
                            text: 'Log Out View',
                            onclick: function() {
                                editor.insertContent('[boot_logged_out]This is what user sees when logged out[/boot_logged_out]');
                            }
                        },
                        {
                            text: 'Login Form',
                            onclick: function() {
                                editor.insertContent('[boot_login_form label_log_in="Login"]');
                            }
                        },
                        {
                            text: 'Log Out Link',
                            onclick: function() {
                                editor.insertContent('[boot_logoutbtn linktext="Log Out" class="btn btn-primary"]');
                            }
                        },
                        {
                            text: 'Password Reset',
                            onclick: function() {
                                editor.insertContent('[password_form]');
                            }
                        }
                    ]
                }
				
			]
		});
	});
})();