#include<bits/stdc++.h>
using namespace std;
long long k;int arr[10000];

long long pw(int n,int j)
{
	if(j==0){return 1;
	}
	return pw(n,j-1)*n;
}
int main()
{ 
	int n,dm;
	cin>>n;
	for(int i=0;i<n;i++)
	{	k=0;
		int nn;
		cin>>nn;
		for(int j=0;j<nn;j++)
		{
			cin>>arr[j];
			for(int l=0;l<j;l++)
			{
				k=k+(arr[j]-arr[l])*pw(2,j-l-1);
			}
		}
		printf("%lld\n",k%(1000000000+7));
	}
}
