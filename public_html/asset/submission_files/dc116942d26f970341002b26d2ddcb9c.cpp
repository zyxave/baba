#include<bits/stdc++.h>
using namespace std;
long long k;int arr[10000];

int main()
{ 
	int n,dm;
	cin>>n;
	for(int i=0;i<n;i++)
	{
		int nn;
		cin>>nn;
		for(int j=0;j<nn;j++)
		{
			cin>>arr[j];
		}
		k=0;dm=nn;
		for(int l=0;l<dm;l++)
		{
			for(int z=nn-1;z>l;z--)
			{
				k=k+(arr[z]-arr[l])*powl(2,z-l-1);
			}
			dm--;
		}
		cout<<k%(1000000000+7)<<endl;
	}
}
