#include<bits/stdc++.h>
using namespace std;
long long k;long long arr[100000];
long long pw(int n,int j)
{
	if(j==0)return 1;
	 return pw(n,j-1)*n;
}
int main()
{
	long long n,dm;
	cin>>n;
	for(int i=0;i<n;i++)
	{
		long long nn;
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
				k=k+(arr[z]-arr[l])*pw(2,z-l-1);
			}
			dm--;
		}
		cout<<k%(1000000000+7)<<endl;
	}
}
