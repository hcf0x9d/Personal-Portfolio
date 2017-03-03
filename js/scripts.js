

var model = {
    view: 'intro'
};

var control = {
    init: function () {
        if (window.location.hash.substr(1) !== '') {
            model.view = window.location.hash.substr(1).split('=')[0];
        } else {
            model.view = 'intro';
            window.location.hash = '#intro';
        }

        control.view.change(model.view);
        control.menu();
    },
    view: {
        change: function (view, cb) {
            if (view !== 'intro') {
                $('.badge').removeClass('mod-full');
            }
            $('.menu-target').removeClass('is-active');
            $('.menu-target[href="#' + model.view.toLowerCase() + '"]').addClass('is-active');

            $('.js-main').fadeTo(250, 0, function () {
                $('.js-main').load('view/' + view + '.view.html', function () {
                    control.view.options[view]();

                    $('.js-main').fadeTo(250, 1);
                    control.externalLinks();
                    if (cb) {
                        cb();
                    }
                });
            });
        },
        options: {
            intro: function () {
                console.log('intro view stuff');
            },
            work: function () {
                $('.work').on('mouseenter mouseleave focusin focusout click', function (e) {

                    if (e.type === 'mouseenter' || e.type === 'focusin') {
                        $(this).addClass('is-hovered');
                    } else if (e.type === 'mouseleave' || e.type === 'focusout') {
                        $(this).removeClass('is-hovered');
                    } else if (e.type === 'click') {
                        var project = this.id;

                        control.view.change('project');
                        window.location.hash = 'project=' + project;
                    }
                });
            },
            project: function () {
                var proj = window.location.hash.substr(1).split('=')[1];
                $('.js-main').fadeTo(250, 0, function () {
                    control.view.getProject(proj, fadeIn);
                });

                function fadeIn() {
                    $('.js-main').fadeTo(250, 1);
                }

            },
            resume: function () {
                $('.stat-graph').each(function () {
                    var val = $(this).data('stat');
                    $(this).append('<span class="stat-graph-bar"></span>');

                    $(this).find('.stat-graph-bar').css('width', val + '%');
                });
            }
        },
        getProject: function (proj, cb) {

            $.ajax('view/projects.xml')
                .success(function (xml) {
                    var node = $(xml).find('project[id="' + proj + '"]');

                    for (var i = node.children().length - 1; i >= 0; i--) {
                        var field = node.children()[i].nodeName;

                        if (field === 'images') {
                            var keyImg = $(node.children()[i]).attr('key');

                            $('#keyImg').attr('src', keyImg);

                            $(node.children()[i]).children().each(function () {
                                var src = this.innerHTML;
                                var html = '<li class="imglist-item">' +
                                        '<img src="' + src + '"/>' +
                                    '</li>';

                                $('#imgList').append(html);
                            });

                        } else {
                            $('#' + field).html(node.children()[i].innerHTML.replace('<![CDATA[', '').replace(']]>', ''));
                        }
                    }
                })
                .done(function (xml) {
                    cb();
                });
        }
    },
    menu: function () {

        $('.hamburger').on('click', function (event) {
            $(this).toggleClass('is-active');
            $('.menu').toggleClass('is-active');
        });
        $('.menu-target').on('click', function (event) {
            model.view = $(this).attr('href').replace('#', '');
            control.view.change(model.view);
        });
    },
    getUrlVars: function () {
        var vars = [], hash;
        var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
        for(var i = 0; i < hashes.length; i++)
        {
            hash = hashes[i].split('=');
            vars.push(hash[0]);
            vars[hash[0]] = hash[1];
        }
        return vars;
    },
    externalLinks: function () {
        $('.link[target="_blank"]').on('click', function () {
            ga('send', 'event', 'External Link', 'Click', $(this).attr('href'));
        });
    }
};

$(function () {
    control.init();
});