#PHP-merge-sort

<h2>Introduction</h2>
<p>Basically sorting algorithms can be divided into two main groups. Such based on comparisons and such that are not. I already posted about some of the algorithms of the first group. Insertion sort, bubble sort and Shell sort are based on the comparison model. The problem with these three algorithms is that their complexity is O(n<sup>2</sup>) so they are very slow. </p>
<p>So is it possible to sort a list of items by comparing their items faster than O(n<sup>2</sup>)? The answer is yes and here’s how we can do it.</p>
<p>The nature of those three algorithms mentioned above is that we almost compared each two items from initial list.</p>
<figure id="attachment_2860" style="width: 620px;" class="wp-caption alignnone"><a href="http://www.stoimen.com/blog/wp-content/uploads/2012/03/Principlesofprimitivesortingalgorithms.png"><img src="http://www.stoimen.com/blog/wp-content/uploads/2012/03/Principlesofprimitivesortingalgorithms.png" alt="Insertion sort and bubble sort make too many comparisons, exactly what merge sort tries to overcome!" title="Principles of primitive sorting algorithms" class="size-full wp-image-2860" width="620"></a><figcaption class="wp-caption-text">Insertion sort and bubble sort make too many comparisons, exactly what merge sort tries to overcome!</figcaption></figure>
<p>This, of course, is not the best approach and we don’t need to do that. Instead we can try to divide the list into smaller lists and then sort them. After sorting the smaller lists, which is supposed to be easier than sorting the entire initial list, we can try to merge the result into one sorted list. This technique is typically known as “divide and conquer”.</p>
<p>Normally if a problem is too difficult to solve, we can try to break it apart into smaller sub-sets of this problem and try to solve them. Then somehow we can merge the results of the solved problems. </p>
<p></p><figure id="attachment_2856" style="width: 620px;" class="wp-caption alignnone"><a href="http://www.stoimen.com/blog/wp-content/uploads/2012/03/Divideandconquer.png"><img src="http://www.stoimen.com/blog/wp-content/uploads/2012/03/Divideandconquer.png" alt="If it's too difficult to sort a large list of items, we can break it apart into smaller sub-lists and try to sort them!" title="Divide and conquer" class="size-full wp-image-2856" width="620"></a><figcaption class="wp-caption-text">If it's too difficult to sort a large list of items, we can break it apart into smaller sub-lists and try to sort them!</figcaption></figure><br>
<span id="more-2847"></span><p></p>
<h2>Overview</h2>
<p>Merge sort is a comparison model sorting algorithm based on the “divide and conquer” principle. So far so good, so let’s say we have a very large list of data, which we want to sort. Obviously it will be better if we divide the list into two sub-lists with equal length and then sort them. If they remain too large, we can continue breaking them down until we get to something very easy to sort as shown on the diagram bellow.</p>
<figure id="attachment_2859" style="width: 620px;" class="wp-caption alignnone"><a href="http://www.stoimen.com/blog/wp-content/uploads/2012/03/Mergepartinmergesort.png"><img src="http://www.stoimen.com/blog/wp-content/uploads/2012/03/Mergepartinmergesort.png" alt="Merge sort is a typical example of divide and conquer technique!" title="Merge part in merge sort" class="size-full wp-image-2859" width="620"></a><figcaption class="wp-caption-text">Merge sort is a typical example of divide and conquer technique!</figcaption></figure>
<p>The thing is that on some step of the algorithm we have two sorted lists and the tricky part is to merge them. However this is not so difficult.<br>
We can start comparing the first items of the lists and than we can pop the smaller of them both and put it into a new list containing the merged (sorted) array.</p>

<h2>Complexity</h2>
<p>It’s great that the complexity of merge sort is O(n*log(n)) even in the worst case! Note that even quicksort’s complexity can be O(n<sup>2</sup>) in the worst case. So we can be sure that merge sort is very stable no matter the input.</p>
<figure id="attachment_2857" style="width: 620px;" class="wp-caption alignnone"><a href="http://www.stoimen.com/blog/wp-content/uploads/2012/03/mergesortcomplexity.png"><img src="http://www.stoimen.com/blog/wp-content/uploads/2012/03/mergesortcomplexity.png" alt="Merge sort complexity is O(n*log(n))" title="merge sort complexity" class="size-full wp-image-2857" width="620"></a><figcaption class="wp-caption-text">Merge sort complexity is O(n*log(n))</figcaption></figure>
<figure id="attachment_2858" style="width: 481px;" class="wp-caption alignnone"><a href="http://www.stoimen.com/blog/wp-content/uploads/2012/03/SortingAlgorithmsComplexity.jpg"><img src="http://www.stoimen.com/blog/wp-content/uploads/2012/03/SortingAlgorithmsComplexity.jpg" alt="Merge sort complexity is O(n*log(n)) even in the worst case!" title="Sorting Algorithms Complexity" class="size-full wp-image-2858" height="104" width="481"></a><figcaption class="wp-caption-text">Merge sort complexity is O(n*log(n)) even in the worst case!</figcaption></figure>
<h2>Two reasons why merge sort is useful</h2>
<h3>1. Fast no matter the input</h3>
<p>Merge sort is a great sorting algorithm mainly because it’s very fast and stable. It’s complexity is the same even in the worst case and it is O(n*log(n)). Note that even quicksort’s complexity is O(n<sup>2</sup>) in the worst case, which for n = 20 is about 4.6 times slower!</p>
<figure id="attachment_2861" style="width: 620px;" class="wp-caption alignnone"><a href="http://www.stoimen.com/blog/wp-content/uploads/2012/03/mergesortvs.bubblesortforn20.png"><img src="http://www.stoimen.com/blog/wp-content/uploads/2012/03/mergesortvs.bubblesortforn20.png" alt="Merge sort is about 4.6 times faster than quicksort for n = 20!" title="mergesort vs. bubble sort for n = 20" class="size-full wp-image-2861" width="620"></a><figcaption class="wp-caption-text"> </figcaption></figure>
<h3>2. Easy implementation</h3>
<p>Another cool reason is that merge sort is easy to implement. Indeed most of the developer consider something fast to be difficult to implement, but that’s not the case of merge sort.</p>
<h2>Three reasons why merge sort is not useful</h2>
<h3>1. Slower than non-comparison based algorithms</h3>
<p>Merge sort is however based on the comparison model and as such can be slower than algorithms non-based on comparisons that can sort data in linear time. Of course, this depends on the input data, so we must be careful for the input.</p>
<h3>2. Difficult to implement for beginners</h3>
<p>Although I don’t think this can be the main reason why not to use merge sort some people say that it can be difficult to implement for beginners, especially the merge part of the algorithm.</p>
<h3>3. Slower than insertion and bubble sort for nearly sorted input</h3>
<p>Again it is very important to know the input data. Indeed if the input is nearly sorted the insertion sort or bubble sort can be faster. Note that in the best case insertion and bubble sort complexity is O(n), while merge sort’s best case is O(n*log(n)).</p>
<p>As a conclusion I can say that merge sort is practically one of the best sorting algorithms because it’s easy to implement and fast, so it must be considered by every developer!</p>

source : http://www.stoimen.com/blog/2012/03/05/computer-algorithms-merge-sort/