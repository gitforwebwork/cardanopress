<?php

/**
 * The template for displaying the ADA Handles.
 *
 * This can be overridden by copying it to yourtheme/cardanopress/part/profile-adahandles.php.
 *
 * @package ThemePlate
 * @since   0.1.0
 */

$userProfile = cardanoPress()->userProfile();
$handles = $userProfile->storedHandles();

if (! $handles) {
    return;
}

?>

<h3>Available $handles</h3>

<ul class="list-none my-0 -mx-2 p-0 flex flex-wrap">
    <?php foreach ($handles as $handle) : ?>
        <li
            class="p-2 w-full sm:w-1/2 lg:w-1/4"
            x-id="['ada-handle']"
        >
            <label :for="$id('ada-handle')">
                <input
                    type="radio"
                    name="favorite-handle"
                    :id="$id('ada-handle')"
                    :disabled="isDisabled()"
                    x-model="selectedHandle"
                    value="<?php echo $handle; ?>"
                >
                    <?php echo $handle; ?>
            </label>
        </li>
    <?php endforeach; ?>
</ul>

<button x-on:click.prevent="handleSave()" x-bind:disabled="isProcessing">Save as favorite</button>
