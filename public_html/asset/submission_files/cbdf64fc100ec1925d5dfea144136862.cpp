#include<bits/stdc++.h>
using namespace std;
long long k;int arr[10000];

int main()
{ 
	int n,dm; long long kk;
	cin>>n;
	for(int i=0;i<n;i++)
	{	k=0;
		int nn;
		cin>>nn;
		for(int j=0;j<nn;j++)
		{
			cin>>arr[j];kk=1;
			for(int l=j-1;l>-1;l--)
			{
				k=k+(arr[j]-arr[l])*kk;
				kk=kk*2;
			}
		}
		printf("%lld\n",k%(1000000000+7));
	}
}
