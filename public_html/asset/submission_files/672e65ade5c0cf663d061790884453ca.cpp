#include <bits/stdc++.h>

using namespace std;
int swp(int n)
{
	int r=0;
	while(n!=0)
	{
		r=r*10;
		r=r+n%10;
		n=n/10;
	}
	return r;
}

int g(int n)
{
	if(n==1)
		return 1;
	else
	{
		int ans=g(n-1)+1;
		if(swp(n)<n && n%10!=0)
			ans=min(ans,g(swp(n))+1);
		return ans;
	}
}

void f()
{
	int n;
	cin>>n;
	printf("%d\n", g(n));
}

int main()
{
	int t;
	cin>>t;
	while(t--)
		f();
}
