<?php if (!defined('APPLICATION')) exit();
$CountDiscussions = 0;
$CategoryID = isset($this->_Sender->CategoryID) ? $this->_Sender->CategoryID : '';

if ($this->Data !== FALSE) {
   foreach ($this->Data->Result() as $Category) {
      $CountDiscussions = $CountDiscussions + $Category->CountDiscussions;
   }
   ?>
<div class="Box BoxCategories">
   <h4><?php echo /*Anchor(*/T('Categories'/*), 'categories/all'*/); ?></h4>
   <ul class="PanelInfo PanelCategories">
      <?php /* ?><li<?php
      if (!is_numeric($CategoryID))
         echo ' class="Active"';
         
      ?>><span><strong><?php echo Anchor(Gdn_Format::Text(T('All Discussions')), '/discussions'); ?></strong><span class="Count"><?php echo number_format($CountDiscussions); ?></span></span></li><?php */ ?>
<?php
   $MaxDepth = C('Vanilla.Categories.MaxDisplayDepth');
   $DoHeadings = C('Vanilla.Categories.DoHeadings');
   
   // ERK - 2011-12-11 - if category is selected, figure out the root category and skip the rest
   $ActiveRootCategory = -1;
   $CurrentRootCategory = -1;
   foreach ($this->Data->Result() as $Category) {
      if($CurrentRootCategory == -1 || $Category->Depth == 1)
	    $CurrentRootCategory = $Category->CategoryID;
	  
      if($CategoryID == $Category->CategoryID)
	    $ActiveRootCategory = $CurrentRootCategory;
   }
   
   
   $CurrentRootCategory = -1;
   foreach ($this->Data->Result() as $Category) {
      if($CurrentRootCategory == -1 || $Category->Depth == 1)
	    $CurrentRootCategory = $Category->CategoryID;
		
      if ($Category->CategoryID < 0 || $MaxDepth > 0 && $Category->Depth > $MaxDepth
	        || ($ActiveRootCategory > -1 && $CurrentRootCategory != $ActiveRootCategory)
	  )
         continue;

      if ($DoHeadings && $Category->Depth == 1)
         $CssClass = 'Heading';
      else
         $CssClass = 'Depth'.$Category->Depth.($CategoryID == $Category->CategoryID ? ' Active' : '');
      
      echo '<li class="'.$CssClass.'">';

      if ($DoHeadings && $Category->Depth == 1) {
         echo Gdn_Format::Text($Category->Name);
      } else {
         echo Wrap(Anchor(($Category->Depth > 1 ? '↳ ' : '').Gdn_Format::Text($Category->Name), '/categories/'.rawurlencode($Category->UrlCode)), 'strong')
            .'<span class="Count">'.number_format($Category->CountAllDiscussions).'</span>';
      }
      echo "</li>\n";
   }
?>
   </ul>
</div>
   <?php
}