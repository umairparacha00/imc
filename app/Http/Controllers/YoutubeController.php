<?php

	namespace App\Http\Controllers;

	use App\FollowedLinks;
	use App\Link;
	use Illuminate\Contracts\Foundation\Application;
	use Illuminate\Contracts\View\Factory;
	use Illuminate\Http\RedirectResponse;
	use Illuminate\Http\Request;
	use Illuminate\Routing\Redirector;
	use Illuminate\Support\Facades\Storage;
	use Illuminate\View\View;

	class YoutubeController extends Controller
	{
		/**
		 * @return Application|Factory|View
		 */
		public function index()
		{
			$links = Link::where('link_type', 'Youtube')->whereDate('created_at', today())
				->orderBy('id', 'asc')->paginate(15);
			return view('youtube.index', ['links' => $links]);
		}

		/**
		 * Display the specified resource.
		 *
		 * @param Link $link
		 *
		 * @return Application|Factory|View
		 */
		public function show(Link $link)
		{
			return view('youtube.show', compact('link'));
		}

		/**
		 * @param Request $request
		 * @param FollowedLinks $followedLinks
		 * @param Link $link
		 * @return Application|RedirectResponse|Redirector
		 */
		public function store(Request $request, FollowedLinks $followedLinks, Link $link)
		{
			$request->validate(
				[
					'image' => ['required', 'image', 'max:2070']
				]
			);

			$linkData = $followedLinks->where('user_id', current_user()->id)
				->where('link_id', $link->id)
				->first();
			if (is_null($linkData)) {
				$file = $request->file('image');
				$name = time() . '_' . current_user()->username . '_' . $link->id . '.' . $file->getClientOriginalExtension();
				$filePath = '/users/youtube/channels/images/' . $name;
				Storage::disk('s3')->put($filePath, file_get_contents($file));
				$followedLinks->create(
					[
						'user_id' => current_user()->id,
						'link_id' => $link->id,
						'image' => $filePath,
					]
				);
				return redirect(route('youtube.channels.index'))->with('toast_success', 'Channel subscription added for approval');
			} else {
				return redirect(route('youtube.channels.index'))->withToastError('Do Not Try To be Over Smart');
			}
		}


		public function subscribersCreate()
		{
			return view('youtube.purchase.subscribers');
		}
	}
