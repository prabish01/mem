protected function storeImage($request)
{
if ($request->hasFile('image')) {
$image = $request->file('image');
$filename = time() . '.' . $image->getClientOriginalExtension();
$image->move(public_path('uploads/product'), $filename);

return [
'image' => $filename,
'alt_text' => $request->input('name') . ' - ' . $request->input('category_name')
];
}
return null;
}