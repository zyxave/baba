#include <bits/stdc++.h>

using namespace std;

int swp(int n)
{
//	string s=n+'0';
	stack<int> i;
	while(n>0)
	{
		i.push(n%10);
		n/=10;
	}
	int pow=1;
	while(!i.empty())
	{
		n+=i.top()*pow;
		pow*=10;
		i.pop();
	}
	return n;
}

int g(int n)
{
	if(n==1)
		return 1;
	else
	{
		int ans=0;
		if(n%10!=0 && swp(n)<n)
			ans+=g(swp(n))+1;
		else
		{
			ans+=g(n-1)+1;
		}
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
