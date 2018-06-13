#include<bits/stdc++.h>
using namespace std;

int t,b,ans,bil,i;
char str[1000001];

void bin(int x)
{
	for(int i=1;i<=x;i++)
	{
		bil*=2;
	}
}

int main ()
{
	cin>>t;
	while(t--)
	{
		cin>>b;
		for(int i=1;i<=b*8;i++)
		{
			cin>>str[i];
		}
		for(int j=i;j>=1;j--)
		{
			if(str[j]=='L')
			{
				bil=1;
				bin(i-j+1);
				ans+=bil;
				if(ans>64)
				{
					printf("%c",ans);
					ans=0;
				}
			}
		}
		cout<<endl;
	}
}
