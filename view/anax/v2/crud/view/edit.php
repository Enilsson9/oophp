<form method="post">
    <fieldset>

    <legend>Edit</legend>
    <input type="hidden" name="contentId" value="<?= esc($content->id) ?>"/>

    <p>
        <label>Title:<br> 
        <input type="text" name="contentTitle" value="<?= esc($content->title) ?>"/>
        </label>
    </p>

    <p>
        <label>Path:<br> 
        <input type="text" name="contentPath" value="<?= esc($content->path) ?>"/>
    </p>

    <p>
        <label>Slug:<br> 
        <input type="text" name="contentSlug" value="<?= esc($content->slug) ?>"/>
    </p>

    <p>
        <label>Text:<br> 
        <textarea name="contentData"><?= esc($content->data) ?></textarea>
     </p>

     <p>
         <label>Type:<br> 
         <input type="text" name="contentType" value="<?= esc($content->type) ?>"/>
     </p>

     <p>
         
         <!--<input type="text" name="contentFilter" value="<?= esc($content->filter) ?>"/>-->

        <div class="form-check">
            <p>Filters:</p>
            <input name="contentFilter[]" class="form-check-input" type="checkbox" value="markdown" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
                Markdown
            </label>
        </div>
        <div class="form-check">
            <input name="contentFilter[]" class="form-check-input" type="checkbox" value="link" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
                Make URL clickable
            </label>
        </div>
        <div class="form-check">
            <input name="contentFilter[]" class="form-check-input" type="checkbox" value="bbcode" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
                BBcode
            </label>
        </div>
     </p>




     <p>
         <label>Publish:<br> 
         <input type="datetime" name="contentPublish" value="<?= esc($content->published) ?>"/>
     </p>

    <p>
        <button type="submit" name="doSave"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
        <button type="reset"><i class="fa fa-undo" aria-hidden="true"></i> Reset</button>
        <button type="submit" name="doDelete"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
    </p>
    </fieldset>
</form>
