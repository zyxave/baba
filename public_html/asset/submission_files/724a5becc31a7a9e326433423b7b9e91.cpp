#include<bits/stdc++.h>
using namespace std;
int main()
{
	int t; cin >> t;
	while(t--)
	{
		long long n; cin >> n;
		long long kir = 1;
		long long kan = 1000000000;
		while(kir < kan)
		{
			long long mid = (kan+kir)/2;
			if((mid)*(mid-1)/2 < n) kir = mid+1;
			else kan = mid;
		
		}
		cout << kir << "\n";
	}
}
