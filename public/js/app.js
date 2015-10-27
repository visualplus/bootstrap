(function() {


}).call(this);

(function() {
  var $;

  $ = jQuery;

  $.fn.extend({
    deptTree: function(options) {
      var _del, add, baseURL, del, rename, settings;
      settings = {
        addBtn: null,
        renameBtn: null,
        deleteBtn: null,
        hideBtn: null,
        baseURL: null
      };
      settings = $.extend(settings, options);
      baseURL = settings.baseURL;
      add = function() {
        var jstree, opts, sel;
        jstree = settings.jstree;
        sel = jstree.get_selected();
        if (sel.length <= 0) {
          return false;
        }
        sel = sel[0];
        opts = {
          text: '',
          created: true
        };
        jstree.edit(jstree.create_node(sel, opts));
        return null;
      };
      rename = function() {
        var jstree, sel;
        jstree = settings.jstree;
        sel = jstree.get_selected();
        if (sel.length <= 0) {
          return false;
        }
        sel = sel[0];
        jstree.edit(sel);
        return null;
      };
      _del = function(sel) {
        var jstree;
        jstree = settings.jstree;
        return $.ajax({
          url: baseURL + '/' + sel,
          type: 'POST',
          data: {
            '_method': 'DELETE'
          },
          dataType: 'JSON',
          success: function(json) {
            return jstree.delete_node(sel);
          },
          error: function(e) {
            return console.log(e);
          }
        });
      };
      del = function() {
        var jstree, parent, sel;
        jstree = settings.jstree;
        sel = jstree.get_selected();
        parent = jstree.get_parent(sel);
        if (sel.length <= 0) {
          return false;
        }
        if (parent === '#') {
          return false;
        }
        _del(sel);
        return null;
      };
      return this.each(function() {
        $(this).jstree({
          core: {
            check_callback: function(operation, node, parent, position, more) {
              return true;
            },
            data: {
              url: function(node) {
                if (node.id === '#') {
                  return baseURL;
                } else {
                  return baseURL + node.id;
                }
              }
            }
          },
          plugins: ['contextmenu', 'search', 'state', 'types', 'wholerow']
        });
        settings.jstree = $(this).jstree(true);
        settings.object = $(this);
        $(this).on('rename_node.jstree', function(ev, node, parent, position) {
          var jstree, node_id;
          jstree = settings.jstree;
          node_id = node.node.id;
          parent = jstree.get_parent(node_id);
          if (node.node.original.created === true) {
            node.node.original.created = false;
            if (node.node.text === '') {
              _del(node_id);
              return false;
            }
            return $.ajax({
              url: baseURL,
              type: 'POST',
              dataType: 'JSON',
              data: {
                p_id: node.node.parent,
                dept_name: node.node.text
              },
              success: function(json) {
                return jstree.refresh(parent);
              },
              error: function(e) {
                return console.log(e);
              }
            });
          } else {
            if (node.node.text === '') {
              return false;
            }
            return $.ajax({
              url: baseURL + '/' + node_id,
              type: 'POST',
              data: {
                '_method': 'PUT',
                dept_name: node.node.text
              },
              dataType: 'JSON'
            });
          }
        });
        $(this).on('select_node.jstree', function(ev, node, selected, event) {
          var opts;
          opts = {
            type: 'dept_id',
            value: node.node.id
          };
          settings.object.trigger('selected.deptlist', opts);
          return null;
        });
        if (settings.addBtn.size() > 0) {
          settings.addBtn.on('click', add);
        }
        if (settings.renameBtn.size() > 0) {
          settings.renameBtn.on('click', rename);
        }
        if (settings.deleteBtn.size() > 0) {
          settings.deleteBtn.on('click', del);
        }
        settings.hideBtn.on('click', function() {
          var body;
          body = settings.object.closest('.itembox-body');
          body.toggleClass('hidden');
          if (body.hasClass('hidden')) {
            $(this).removeClass('fa-caret-up');
            return $(this).addClass('fa-caret-down');
          } else {
            $(this).removeClass('fa-caret-down');
            return $(this).addClass('fa-caret-up');
          }
        });
        return $(this);
      });
    }
  });

}).call(this);

(function() {
  var $;

  $ = jQuery;

  $.fn.extend({
    getUser: function(options) {
      var _get, settings;
      settings = {
        url: '',
        where: {
          type: 'dept_id',
          value: 1
        },
        fire: {
          object: null
        },
        target: null,
        renerer: 'userlist.default'
      };
      settings = $.extend(settings, options);
      _get = function(ev, data) {
        $.ajax({
          url: settings.url,
          type: 'GET',
          dataType: 'HTML',
          data: {
            type: data.type,
            value: data.value,
            renderer: settings.renderer
          },
          success: function(html) {
            return settings.target.html(html);
          },
          error: function(e) {
            return console.log(e);
          }
        });
        return null;
      };
      return this.each(function() {
        settings.fire.object.on('selected.deptlist', _get);
        return $(this);
      });
    }
  });

}).call(this);

//# sourceMappingURL=app.js.map
