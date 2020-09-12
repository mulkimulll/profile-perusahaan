(function($) {
    "use strict";
	$(document).ready(function() {
		$('#sidebarCollapse').on('click', function() {
			$('#sidebar').toggleClass('active');
		});
		Waves.init();
		Waves.attach('.wave-effect', ['waves-button']);
		Waves.attach('.wave-effect-float', ['waves-button', 'waves-float']);
	});
	$(function() {
		$('.slimescroll-id').slimScroll({
			height: 'auto'
		});
	});
	$(document).ready(function() {
		$("#sidebar a").each(function() {
		  var pageUrl = window.location.href.split(/[?#]/)[0];
			if (this.href == pageUrl) {
				$(this).addClass("active");
				$(this).parent().addClass("active"); // add active to li of the current link
				$(this).parent().parent().prev().addClass("active"); // add active class to an anchor
				$(this).parent().parent().prev().click(); // click the item to make it drop
			}
		});
	});

	var searchField = $('.search');
	var searchInput = $("input[type='search']");

	var checkSearch = function(){
		var contents = searchInput.val();
		if(contents.length !== 0){
		   searchField.addClass('full');
		} else {
		   searchField.removeClass('full');
		}
	};

	$("input[type='search']").focus(function(){
		searchField.addClass('isActive');
	  }).blur(function(){
		searchField.removeClass('isActive');
		checkSearch();
	});

	$(function(){
	   if ($('#ms-menu-trigger')[0]) {
			$('body').on('click', '#ms-menu-trigger', function() {
				$('.ms-menu').toggleClass('toggled');
			});
		}
	});


	// ______________Full screen
	$("#fullscreen-button").on("click", function toggleFullScreen() {
      if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
        if (document.documentElement.requestFullScreen) {
          document.documentElement.requestFullScreen();
        } else if (document.documentElement.mozRequestFullScreen) {
          document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webkitRequestFullScreen) {
          document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
        } else if (document.documentElement.msRequestFullscreen) {
          document.documentElement.msRequestFullscreen();
        }
      } else {
        if (document.cancelFullScreen) {
          document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
          document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
          document.webkitCancelFullScreen();
        } else if (document.msExitFullscreen) {
          document.msExitFullscreen();
        }
      }
    })


// ______________ PAGE LOADING
	$(window).on("load", function(e) {
		$("#global-loader").fadeOut("slow");
	})

	// ______________ BACK TO TOP BUTTON

	$(window).on("scroll", function(e) {
    	if ($(this).scrollTop() > 0) {
            $('#back-to-top').fadeIn('slow');
        } else {
            $('#back-to-top').fadeOut('slow');
        }
    });

    $("#back-to-top").on("click", function(e){
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });
	if ($('.chart-circle').length) {
		$('.chart-circle').each(function() {
			let $this = $(this);

			$this.circleProgress({
			  fill: {
				color: $this.attr('data-color')
			  },
			  size: $this.height(),
			  startAngle: -Math.PI / 4 * 2,
			  emptyFill: '#f4f5fa',
			  lineCap: 'round'
			});
		});
	  }
})(jQuery);

$(function(e) {
    /** Constant div card */
    const DIV_CARD = 'div.card';
    /** Initialize tooltips */
    $('[data-toggle="tooltip"]').tooltip();

    /** Initialize popovers */
    $('[data-toggle="popover"]').popover({
        html: true
    });
    /** Function for remove card */
    $('[data-toggle="card-remove"]').on('click', function(e) {
        let $card = $(this).closest(DIV_CARD);

        $card.remove();

        e.preventDefault();
        return false;
    });

    /** Function for collapse card */
    $('[data-toggle="card-collapse"]').on('click', function(e) {
        let $card = $(this).closest(DIV_CARD);

        $card.toggleClass('card-collapsed');

        e.preventDefault();
        return false;
    });
    $('[data-toggle="card-fullscreen"]').on('click', function(e) {
        let $card = $(this).closest(DIV_CARD);

        $card.toggleClass('card-fullscreen').removeClass('card-collapsed');

        e.preventDefault();
        return false;
    });

    $(document).on("keypress keyup blur",'input.num-only',function (event) {
        //this.value = this.value.replace(/[^0-9\.]/g,'');
        $(this).val($(this).val().replace(/[^0-9\.]/g,''));
        if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    });
});

// save form
function saveform(route,data) {
    swal({
        title: 'Apakah Anda Yakin?',
        type: 'question',
        showCancelButton: true,
        confirmButtonText: 'Iya',
        cancelButtonText: 'Tidak',
        allowOutsideClick: false
    }).then(function(result) {
        if (result.value) {
            swal({
                title:'Mohon menunggu',
                allowOutsideClick:false,
            })
            swal.showLoading()
            $.post(route, data,function(r) {
                swal({
                    type: 'success',
                    title: 'Data berhasil disimpan',
                    showConfirmButton: false,
                    timer: 1500
                })
                $('#modal').modal('hide')
                $('#list').DataTable().ajax.reload(null, false);
                $('#modal').empty()
            }, 'json').fail(function(response) {
                console.log(response)
                swal(
                    'Terjadi Kesalahan!',
                    //response.responseText,
                    'Mohon Dicek Kembali',
                    'error'
                )
            })
        }
    })
}

// save form then redirect
function saverd(route,data,redirect) {
    swal({
        title: 'Apakah Anda Yakin?',
        type: 'question',
        showCancelButton: true,
        confirmButtonText: 'Iya',
        cancelButtonText: 'Tidak',
        allowOutsideClick: false
    }).then(function(result) {
        if (result.value) {
            swal({
                title:'Mohon menunggu',
                allowOutsideClick:false,
            })
            swal.showLoading()
            $.post(route, data,function(r) {
                swal({
                    type: 'success',
                    title: 'Data berhasil disimpan',
                    showConfirmButton: false,
                    timer: 1500
                }).then(()=>{
                    window.location = redirect
                })
            }, 'json').fail(function(response) {
                console.log(response)
                swal(
                    'Terjadi Kesalahan!',
                    //response.responseText,
                    'Mohon Dicek Kembali',
                    'error'
                )
            })
        }
    })
}
function saverd2(route,data,redirect) {
    swal({
        title: 'Apakah Anda Yakin?',
        type: 'question',
        showCancelButton: true,
        confirmButtonText: 'Iya',
        cancelButtonText: 'Tidak',
        allowOutsideClick: false
    }).then(function(result) {
        if (result.value) {
            swal({
                title:'Mohon menunggu',
                allowOutsideClick:false,
            })
            swal.showLoading()
            $.post(route, data,function(r) {
                swal({
                    type: 'success',
                    title: 'Data berhasil disimpan',
                    showConfirmButton: false,
                    timer: 1500
                }).then(()=>{
                    window.location = redirect
                })
            }, 'json').fail(function(response) {
                console.log(response)
                swal(
                    'Terjadi Kesalahan!',
                    response.responseText,
                    // 'Mohon Dicek Kembali',
                    'error'
                )
            })
        }
    })
}
function selesai(route,data,redirect) {
    swal({
        title: 'Silahkan upload p21/spsidik/splidik',
		showCancelButton: true,
		showConfirmButton: false,
        cancelButtonText: 'Oke',
        allowOutsideClick: false
    }).then(function(result) {
        if (result.value) {
            swal({
                title:'Mohon menunggu',
                allowOutsideClick:false,
            })
            swal.showLoading()
            $.post(route, data,function(r) {
                swal({
                    type: 'success',
                    title: 'Data berhasil disimpan',
                    showConfirmButton: false,
                    timer: 1500
                }).then(()=>{
                    window.location = redirect
                })
            }, 'json').fail(function(response) {
                console.log(response)
                swal(
                    'Terjadi Kesalahan!',
                    //response.responseText,
                    'Mohon Dicek Kembali',
                    'error'
                )
            })
        }
    })
}

// delete data
function deldata(route,data,txt) {
	swal({
		title: 'Apakah anda yakin untuk manghapus '+txt+'?',
		type: 'question',
		showCancelButton: true,
		confirmButtonText: 'Iya!',
		cancelButtonText: 'Batal',
		allowOutsideClick: false
	}).then(function(result) {
		if (result.value) {
			swal({
				title: 'Mohon menunggu',
				allowOutsideClick: false,
			})
			swal.showLoading()
			$.post(route, data, function(r) {
				console.log(r.status)
				swal({
					type: 'success',
					title: 'Data berhasil dihapus',
					showConfirmButton: false,
					timer: 1500
				})
				$('#list').DataTable().ajax.reload(null, false);
			}, 'json').fail(function(response) {
				console.log(response)
				swal(
					'Terjadi Kesalahan!',
					// response.responseText,
					'Mohon Dicek Kembali',
					'error'
				)
			});
		}
	})
}

// upload data
function uploaddata(route,form_data) {
	swal({
		title: 'Apakah Anda Yakin?',
		type: 'question',
		showCancelButton: true,
		confirmButtonText: 'Iya',
		cancelButtonText: 'Tidak',
		allowOutsideClick: false
	}).then(function(result) {
		if (result.value) {
			loadshow()

			$.ajax({
				url: route,
				cache: false,
				contentType: false,
				processData: false,
				data: form_data,
				type: 'post',
				success: (res)=>{
					swal({
						type: 'success',
						title: 'Data berhasil disimpan',
						showConfirmButton: false,
						timer: 1500
					})
					$('#modal').modal('hide')
					getBerkas()
					$('#modal').empty()
				},
				error:(err)=>{
					console.log(err)
					swal(
						'Terjadi Kesalahan!',
						//response.responseText,
						'Mohon Dicek Kembali',
						'error'
					)
				},
			})
		}
	})

}

function toRoman(num) {
  var result = '';
  var decimal = [1000, 900, 500, 400, 100, 90, 50, 40, 10, 9, 5, 4, 1];
  var roman = ["M", "CM","D","CD","C", "XC", "L", "XL", "X","IX","V","IV","I"];
  for (var i = 0;i<=decimal.length;i++) {
    while (num%decimal[i] < num) {
      result += roman[i];
      num -= decimal[i];
    }
  }
  return result;
}

// stack modal
$(document).on('show.bs.modal', '.modal', function (event) {
	var zIndex = 1040 + (10 * $('.modal:visible').length);
	$(this).css('z-index', zIndex);
	setTimeout(function() {
		$('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
	}, 0);
});
$('.modal').on('hidden.bs.modal', function (e) {
    if($('.modal').hasClass('show')) {
    	$('body').addClass('modal-open');
    }
});
$('#modal1').on('show.bs.modal', function (e) {
	$('#modal .modal-dialog').addClass('maside')
});
$('#modal1').on('hidden.bs.modal', function (e) {
	$('#modal .modal-dialog').removeClass('maside')
});

function loadshow() {
	swal({
		title:'Mohon menunggu',
		allowOutsideClick: () => !swal.isLoading()
	})
	swal.showLoading()
}
function loadhide() {
	swal.close()
}

const loader4=`
	<div class="spinner4">
		<div class="bounce1"></div>
		<div class="bounce2"></div>
		<div class="bounce3"></div>
	</div>
`

$.fn.serializeObject = function()
{
   var o = {};
   var a = this.serializeArray();
   $.each(a, function() {
       if (o[this.name]) {
           if (!o[this.name].push) {
               o[this.name] = [o[this.name]];
           }
           o[this.name].push(this.value || '');
       } else {
           o[this.name] = this.value || '';
       }
   });
   return o;
};


// $('.text-truncate').each(function(i) {
// 	if (isEllipsisActive(this)) {
// 		$(this).attr("title", $(this).text());
// 	}
// })
function isEllipsisActive(e) {
     return (e.offsetWidth < e.scrollWidth);
}


// normalizeData ================
	/**
	 * Copyright (C) 2017 Kyle Florence
	 *
	 * This program is free software; you can redistribute it and/or
	 * modify it under the terms of the GNU General Public License
	 * as published by the Free Software Foundation; either version 2
	 * of the License, or (at your option) any later version.
	 *
	 * This program is distributed in the hope that it will be useful,
	 * but WITHOUT ANY WARRANTY; without even the implied warranty of
	 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	 * GNU General Public License for more details.
	 *
	 * You should have received a copy of the GNU General Public License
	 * along with this program; if not, write to the Free Software
	 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
	 *
	 * @website https://github.com/kflorence/jquery-deserialize/
	 * @version 2.0.0-rc1
	 *
	 * Dual licensed under the MIT and GPLv2 licenses.
	 */
	(function( factory ) {
	  if ( typeof module === "object" && module.exports ) {
	    // Node/CommonJS
	    module.exports = factory( require( "jquery" ) );

	  } else {
	    // Browser globals
	    factory( window.jQuery );
	  }
	}(function( $ ) {

	  /**
	   * Updates a key/valueArray with the given property and value. Values will always be stored as arrays.
	   *
	   * @param prop The property to add the value to.
	   * @param value The value to add.
	   * @param obj The object to update.
	   * @returns {object} Updated object.
	   */
	  function updateKeyValueArray( prop, value, obj ) {
	    var current = obj[ prop ];

	    if ( current === undefined ) {
	      obj[ prop ] = [ value ];

	    } else {
	      current.push( value );
	    }

	    return obj;
	  }

	  /**
	   * Get all of the fields contained within the given elements by name.
	   *
	   * @param $elements jQuery object of elements.
	   * @param filter Custom filter to apply to the list of fields.
	   * @returns {object} All of the fields contained within the given elements, keyed by name.
	   */
	  function getFieldsByName( $elements, filter ) {
	    var elementsByName = {};

	    // Extract fields from elements
	    var fields = $elements
	      .map(function convertFormToElements() {
	        return this.elements ? $.makeArray( this.elements ) : this;
	      })
	      .filter( filter || ":input:not(:disabled)" )
	      .get();

	    $.each( fields, function( index, field ) {
	      updateKeyValueArray( field.name, field, elementsByName );
	    });

	    return elementsByName;
	  }

	  /**
	   * Figure out the type of an element. Input type will be used first, falling back to nodeName.
	   *
	   * @param element DOM element to check type of.
	   * @returns {string} The element's type.
	   */
	  function getElementType( element ) {
	    return ( element.type || element.nodeName ).toLowerCase();
	  }

	  /**
	   * Normalize the provided data into a key/valueArray store.
	   *
	   * @param data The data provided by the user to the plugin.
	   * @returns {object} The data normalized into a key/valueArray store.
	   */
	  function normalizeData( data ) {
	    var normalized = {};
	    var rPlus = /\+/g;

	    // Convert data from .serializeObject() notation
	    if ( $.isPlainObject( data ) ) {
	      $.extend( normalized, data );

	      // Convert non-array values into an array
	      $.each( normalized, function( name, value ) {
	        if ( !$.isArray( value ) ) {
	          normalized[ name ] = [ value ];
	        }
	      });

	    // Convert data from .serializeArray() notation
	    } else if ( $.isArray( data ) ) {
	      $.each( data, function( index, field ) {
	        updateKeyValueArray( field.name, field.value, normalized );
	      });

	    // Convert data from .serialize() notation
	    } else if ( typeof data === "string" ) {
	      $.each( data.split( "&" ), function( index, field ) {
	        var current = field.split( "=" );
	        var name = decodeURIComponent( current[ 0 ].replace( rPlus, "%20" ) );
	        var value = decodeURIComponent( current[ 1 ].replace( rPlus, "%20" ) );
	        updateKeyValueArray( name, value, normalized );
	      });
	    }

	    return normalized;
	  }

	  /**
	   * Map of property name -> element types.
	   *
	   * @type {object}
	   */
	  var updateTypes = {
	    checked: [
	      "radio",
	      "checkbox"
	    ],
	    selected: [
	      "option",
	      "select-one",
	      "select-multiple"
	    ],
	    value: [
	      "button",
	      "color",
	      "date",
	      "datetime",
	      "datetime-local",
	      "email",
	      "hidden",
	      "month",
	      "number",
	      "password",
	      "range",
	      "reset",
	      "search",
	      "submit",
	      "tel",
	      "text",
	      "textarea",
	      "time",
	      "url",
	      "week"
	    ]
	  };

	  /**
	   * Get the property to update on an element being updated.
	   *
	   * @param element The DOM element to get the property for.
	   * @returns The name of the property to update if element is supported, otherwise `undefined`.
	   */
	  function getPropertyToUpdate( element ) {
	    var type = getElementType( element );
	    var elementProperty = undefined;

	    $.each( updateTypes, function( property, types ) {
	      if ( $.inArray( type, types ) > -1 ) {
	        elementProperty = property;
	        return false;
	      }
	    });

	    return elementProperty;
	  }

	  /**
	   * Update the element based on the provided data.
	   *
	   * @param element The DOM element to update.
	   * @param elementIndex The index of this element in the list of elements with the same name.
	   * @param value The serialized element value.
	   * @param valueIndex The index of the value in the list of values for elements with the same name.
	   * @param callback A function to call if the value of an element was updated.
	   */
	  function update( element, elementIndex, value, valueIndex, callback ) {
	    var property = getPropertyToUpdate( element );

	    // Handle value inputs
	    // If there are multiple value inputs with the same name, they will be populated by matching indexes.
	    if ( property == "value" && elementIndex == valueIndex ) {
	      element.value = value;
	      callback.call( element, value );

	    // Handle select menus, checkboxes and radio buttons
	    } else if ( property == "checked" || property == "selected" ) {
	      var fields = [];

	      // Extract option fields from select menus
	      if ( element.options ) {
	        $.each( element.options, function( index, option ) {
	          fields.push( option );
	        });

	      } else {
	        fields.push( element );
	      }

	      // #37: Remove selection from multiple select menus before deserialization
	      if ( element.multiple && valueIndex == 0 ) {
	        element.selectedIndex = -1;
	      }

	      $.each( fields, function( index, field ) {
	        if ( field.value == value ) {
	          field[ property ] = true;
	          callback.call( field, value );
	        }
	      });
	    }
	  }

	  /**
	   * Default plugin options.
	   *
	   * @type {object}
	   */
	  var defaultOptions = {
	    change: $.noop,
	    complete: $.noop
	  };

	  /**
	   * The $.deserialize function.
	   *
	   * @param data The data to deserialize.
	   * @param options Additional options.
	   * @returns {jQuery} The jQuery object that was provided to the plugin.
	   */
	  $.fn.deserialize = function( data, options ) {

	    // Backwards compatible with old arguments: data, callback
	    if ( $.isFunction( options ) ) {
	      options = { complete: options };
	    }

	    options = $.extend( defaultOptions, options || {} );
	    data = normalizeData( data );

	    var elementsByName = getFieldsByName( this, options.filter );

	    $.each( data, function( name, values ) {
	      $.each( elementsByName[ name ], function( elementIndex, element ) {
	        $.each( values, function( valueIndex, value ) {
	          update( element, elementIndex, value, valueIndex, options.change );
	        });
	      });
	    });

	    options.complete.call( this );

	    return this;
	  };
	}));
// normalizeData ==================================
