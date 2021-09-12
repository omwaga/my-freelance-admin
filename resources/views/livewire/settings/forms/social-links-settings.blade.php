<div class="mt-8 mx-auto w-1/2 bg-white rounded-md p-2">
    <h1 class="text-xl mt-4 mb-4 text-center">Social Links Settings</h1>
    <form wire:submit.prevent="saveSocials">
        @csrf
        <div class="form-group mt-3 mb-3 p-2">
            <label for="facebook" class="">Facebook Url</label>
            <br>
            <input type="url" wire:model="facebook_url" id="facebook" name="facebook_url" required
                   class="border rounded-lg mt-2 p-2 w-full">
            @error('facebook_url')
            <span class="error text-red-400">{{ $message }}</span> @enderror</div>
        <div class="form-group mt-3 mb-3 p-2"><label for="instagram" class="">Instagram Url</label>
            <br>
            <input type="url" id="instagram" wire:model="instagram_url" name="instagram_url" required
                   class="border rounded-lg mt-2 p-2 w-full">
            @error('instagram_url') <span
                class="error text-red-400">{{ $message }}</span> @enderror</div>
        <div class="form-group mt-3 mb-3 p-2"><label for="twitter" class="">Twitter Url</label>
            <br>
            <input type="url" id="twitter" name="twitter_url" wire:model="twitter_url" required
                   class="border rounded-lg mt-2 p-2 w-full">
            @error('twitter_url') <span
                class="error text-red-400">{{ $message }}</span> @enderror</div>
        <div class="form-group mt-3 mb-3 p-2"><label for="linkedin" class="">Linkedin Url</label>
            <br>
            <input type="url" id="linkedin" wire:model="linkedin_url" name="linkedin_url" required
                   class="border rounded-lg mt-2 p-2 w-full">
            @error('linkedin_url') <span
                class="error text-red-400">{{ $message }}</span> @enderror</div>
        <input type="submit" value="add" class="mx-auto p-2 w-24 rounded bg-blue-400 text-white">
    </form>
</div>
