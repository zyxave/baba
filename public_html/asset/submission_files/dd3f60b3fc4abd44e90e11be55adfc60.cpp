#include<bits/stdc++.h>
using namespace std;

int t,hit,n,a[1000001];

int main ()
{
	cin>>t;
	while(t--)
	{
		hit=0;
		cin>>n;
		for(int i=2;i<=sqrt(n);i++)
		{
			for(int j=i;j<=sqrt(n);j++)
			{
				if(a[i*j]==0)
				{
					a[i*j]=1;
					hit++;	
				}
				else
				{
					hit--;
				}
			}
		}
		cout<<hit<<endl;
	}
}
