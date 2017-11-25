<script type="text/javascript">
	$(document).ready(function () {
		var validator = $("#form1").bootstrapValidator({
			feedbackIcons: {
				valid: "glyphicon glyphicon-ok-sign",
				invalid: "glyphicon glyphicon-remove-sign", 
				validating: "glyphicon glyphicon-refresh"
			}, 
			fields : {

                nama : {
                    validators: {
                        stringLength : {
                            min: 3,
                            message: "Nama anda harus diisi dengan benar"
                        }, 
                        regexp : {
                            regexp : /[a-zA-Z]/,
                            message: "Tidak Dapat Menggunakan Angka"
                        }
                    }
                },

				email : {
					message : "Email harus diisi dan memiliki tanda @",
					validators : {
						stringLength: {
							min : 4, 
							max: 35,
							message: "Email anda minimal 4 sampai 35 huruf"
						},
						emailAddress: {
							message: "Email harus ada tanda @"
						}
					}
				},

             
				txtemail2 :{
					message : "Harus Diisi, dan harus ada @",
					validators : {
						stringLength: {
							min : 4, 
							max: 35,
							message: "Email minimal 4 sampai 35"
						},
						emailAddress: {
							message: "Email harus ada @"
						}
					}
				},

                uname : {
                    validators: {
                        stringLength : {
                            min: 3,
                            max: 12,
                            message: "Username Minimal 3 sampai dengan 12"
                        }, 
                        regexp : {
                            regexp : /^[a-zA-Z0-9_\.]+$/,
                            message: 'Tidak Dapat di Spasi'
                        }
                    }
                },
                pass1 : {
                    validators: {
                       
                        stringLength : {
                            min: 6,
                            message: "Password min 6"
                        },
                        different : {
                            field : "email", 
                            message: "Email address and password can not match"
                        }
                    }
                },

                pass2 : {
                    validators: {
                    notEmpty: {
                        message: 'Kolom Tidak Boleh Kosong'
                    },
                    identical: {
                        field: 'pass1',
                        message: 'Password tidak Sama'
                    }
                    
                }
	            },
                
                passlama : {
                    validators: {
                       
                        stringLength : {
                            min: 6,
                            message: "Password min 6"
                        },
                        different : {
                            field : "email", 
                            message: "Email address and password can not match"
                        }
                    }
                },	            


           
                agree :{
                    validators: {
                    notEmpty: {
                        message: 'Harap dicentang untuk menyetujui persetujuannya'
                        }
                    }

                },
            

                  komentar : {
                    validators: {
                        
                        stringLength : {
                            min: 3,
                            message: "Komentar harus lebih dari 3"
                        }
                       
                    }
                },
                nmbank: {
                    validators: {
                        
                        stringLength : {
                            min: 3,
                            message: "Isi nama bank anda dengan benar"
                        }, 
                       
                    }
                },
                nmbrg: {
                    validators: {
                        
                        stringLength : {
                            min: 3,
                            message: "Isi nama barang dengan bener"
                        }, 
                        regexp : {
                            regexp : /^[a-zA-Z_\.]+$/,
                            message: 'Jgn menggunakan tanda baca'
                        }
                    }
                },
                jumlah: {
                validators: {
                    
                    digits: {
                        message:"Harus Mengunakan Angka"
                    },
                    stringLength : {
                            min: 3,
                            message: "Terlalu Sedikit"
                    }

                }
            },
                norek: {
                validators: {
                    
                    digits: {
                        message:"Harus Mengunakan Angka"
                    },
                    stringLength : {
                            min: 10,
                            message: "Nomor Rekening Min 10"
                    }

                }
            },
                notlp: {
                validators: {
                    
                    digits: {
                        message:"Harus Mengunakan Angka"
                    },
                    stringLength : {
                            min: 10,
                            message: "Nomor Min 10"
                    }

                }
            },
           bank: {
                    validators : {
                        notEmpty : {
                            message: "Pilih Bank"
                        }
                    }
            },
            
            prop : {
                    validators : {
                        notEmpty : {
                            message: "Pilih Provinsi"
                        }
                    }
            },
            kota : {
                    validators : {
                        notEmpty : {
                            message: "Pilih Kota"
                        }
                    }
            },
            alamat : {
                    validators:{
                        stringLength : {
                            min: 7,
                            message: "Isi Alamat minimal 10, Isi dengan benar"
                        }
                        
                    }
                },

                qty : {
                    validators:{
                        digits: {
                        message:"Harus Mengunakan Angka"
                        }
                        
                    }
                },
            

            kodepos: {
                validators: {
                   
                    digits: {
                        message:"Harus Mengunakan Angka"
                    },
                    stringLength : {
                            min: 4,
                            message: "Nomor Min 4"
                    }

                }
            }        
        } 
    });     

});
</script>


<script type="text/javascript">
    function showResultKota(str) {
  if (str.length==0) { 
    document.getElementById("kota").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==1){
      document.getElementById("kota").innerHTML='<option value="">Loading...</option>';
    }
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("kota").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","ongkir/kabupaten.php?q="+str,true);
  xmlhttp.send();
}
</script>