<div class="mt-8 mx-auto w-1/2 bg-white rounded-md p-2">
    <form wire:submit.prevent="saveQuestion">
        <div class="form-group mt-3 mb-3 p-2">
            <label for="question" class="">Question</label>
            <textarea wire:model="question" id="question" class="border rounded w-full p-2"
                      aria-label="question" required></textarea>
            @error('question')
            <span class="error text-red-400">{{ $message }}</span> @enderror</div>
        <div class="form-group mt-3 mb-3 p-2"><label for="choice-one" class="">Choice 1</label><textarea
                wire:model="choice_one" name="choice_one" id="choice-one" class="border rounded w-full p-2"
                aria-label="question" required></textarea>@error('choice_one') <span
                class="error text-red-400">{{ $message }}</span> @enderror</div>
        <div class="form-group mt-3 mb-3 p-2"><label for="choice-two" class="">Choice 2</label><textarea
                wire:model="choice_two" name="choice_two" id="choice-two" class="border rounded w-full p-2"
                aria-label="question" required></textarea>@error('choice_two') <span
                class="error text-red-400">{{ $message }}</span> @enderror</div>
        <div class="form-group mt-3 mb-3 p-2"><label for="choice-three" class="">Choice 3</label><textarea
                wire:model="choice_three" name="choice_three" id="choice-three" class="border rounded w-full p-2"
                aria-label="question" required></textarea>@error('choice_three') <span
                class="error text-red-400">{{ $message }}</span> @enderror</div>
        <div class="form-group mt-3 mb-3 p-2"><label for="choice-four" class="">Choice 4</label><textarea
                wire:model="choice_four" name="choice_four" id="choice-four" class="border rounded w-full p-2"
                aria-label="question" required></textarea>@error('choice_four') <span
                class="error text-red-400">{{ $message }}</span> @enderror</div>
        <div class="form-group mt-3 mb-3 p-2"><label for="answer" class="">Answer</label><br><select
                wire:model="answer" name="answer" id="answer" aria-label="answer"
                class="w-full bg-white border rounded p-2">
                <option value="">Select</option>
                <option value="1">Choice One</option>
                <option value="2">Choice Two</option>
                <option value="3">Choice Three</option>
                <option value="4">Choice Four</option>
            </select>@error('answer')<span class="error text-red-400">{{ $message }}</span> @enderror</div>
        <div class="mx-auto w-1/3 text-center">
            <input type="submit" value="add" class="mx-auto p-2 w-24 rounded bg-blue-400 text-white">
        </div>
    </form>
</div>
