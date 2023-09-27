<script id="tmpl-nf-save-item" type="text/template">
  <!--{{ data.save_id }}-->
  {{{ data.columns() }}}
  <td>{{ data.updated }}</td>
  <td style="text-align:right;">
    <a class="load"><?php _e('Load', 'ninja-forms-save-progress'); ?></a>
    <a class="cancel"><?php _e('Cancel', 'ninja-forms-save-progress'); ?></a>
  </td>
</script>
